<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Downloadfile;
use App\Speedrecord;

use ZipArchive;

class DownloadfileController extends Controller
{

    private $downloadfile;


    public function __construct(Downloadfile $downloadfile)
    {

        $this->downloadfile = $downloadfile;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $downloadfiles = $this->downloadfile->paginate(10);

        return view('admin.downloadfiles.index', compact('downloadfiles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->file('filename')->isValid())
        {
            // obter a opm do policial logado
            $user = \App\User::find(auth()->id());
            $opm = $user->opm;


            /** Cria o array $data com os dados necessários para instanciar o objeto Downloadfile */
            $data = [
                'filename'=> $opm->number . '_' . $request->filename->getClientOriginalName(),
                'size' =>$request->filename->getClientSize(),
                'user_id' => $user->id,
            ];


            /** Grava o arquivo .zip na pasta "/admin/triagem/imagensradar" */
            $caminho = 'public/admin/triagem/imagensradar';
            $filetoberecorded = $request->filename;
            $filetoberecorded->storeAs($caminho, $data['filename']);



            /** Instancia o objeto Downloadfile e armazena as informações no banco*/
            $downloadfile = $this->downloadfile->create($data);


            /**
             * 
             * Implementação da leitura do arquivo zip
             * 
             */
            $zip = new ZipArchive;
            
            $resultado = $zip->open('../storage/app/public/admin/triagem/imagensradar/' . ($data['filename']));
            
            if($resultado === TRUE)
            {

                $registro = array();

                for($i = 0; $i < $zip->count(); $i++)
                {

                    $linha = $zip->getNameIndex($i);

                    

                    if (strcasecmp($linha, 'CONTRATO.DAT'))
                    {

                        //$downloadfile_id = $downloadfile->id;
                        $radar              = substr($linha, 0, 8);
                        $locationtype       = 'SP';
                        $sp                 = substr($linha, 8, 3) . '/' . substr($linha, 11, 3);
                        $km                 = substr($linha, 14, 3) . ',' . substr($linha, 17,3);
                        $runwaysense        = substr($linha, 20, 5);
                        $ano                = substr($linha, 30, 4);
                        $mes                = substr($linha, 28, 2);
                        $dia                = substr($linha, 26, 2);
                        $horas              = substr($linha, 34, 2);
                        $minutos            = substr($linha, 36, 2);
                        $segundos           = substr($linha, 38, 2);
                        $dateofinfringement = substr($linha, 30, 4) . '/' . substr($linha, 28, 2) . '/' . substr($linha, 26, 2) . ' ' . substr($linha, 34, 2) . ':' . substr($linha, 36, 2) . ':' . substr($linha, 38, 2);
                        $allowedspeed       = substr($linha, 40, 3);
                        $measuredspeed      = substr($linha, 43, 3);
                        $photonumber        = substr($linha, 46, 6);
                        $policeman          = substr($linha, 59, 7);

                        if(!checkdate(intval($mes), intval($dia), intval($ano)))
                        {
                            $dateofinfringement = '1900/01/01 00:00:00';
                        }
                        
                        $speedrecords = new Speedrecord;

                        $speedrecords->downloadfile_id  = $downloadfile->id;
                        $speedrecords->radar            = $radar;
                        $speedrecords->locationtype     = $locationtype;
                        $speedrecords->sp               = $sp;
                        $speedrecords->km               = $km;
                        $speedrecords->runwaysense      = $runwaysense;
                        $speedrecords->dateofinfringement = $dateofinfringement;
                        $speedrecords->allowedspeed     = $allowedspeed;
                        $speedrecords->measuredspeed    = $measuredspeed;
                        $speedrecords->photonumber      = $photonumber;
                        $speedrecords->policeman        = $policeman;


                        $speedrecord = $speedrecords->save();
                        
                    }
                    
                }

                $zip->close();

            }
            else
            {
                return "Falhou! Código: " . $resultado;
            }

        }
        else{

            flash('Arquivo inválido!')->error();
            
        }

        flash('Upload realizado com sucesso!')->success();
        
        return redirect()->route('admin.downloadfiles.index');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $downloadfile
     * @return \Illuminate\Http\Response
     */
    public function show($downloadfile)
    {

        $downloadfile = $this->downloadfile->find($downloadfile);

        $speedrecords = $downloadfile->speedrecord->all();

        return view('admin.downloadfiles.show', compact('downloadfile', 'speedrecords'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $downloadfile
     * @return \Illuminate\Http\Response
     */
    public function edit($downloadfile)
    {
        
        $downloadfile = $this->downloadfile->find($downloadfile);

        return view('admin.downloadfiles.edit', compact('downloadfile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $downloadfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $downloadfile)
    {

        $data = $request->all();

        $downloadfile = $this->downloadfile->find($downloadfile);

        $downloadfile->update($data);

        flash('Arquivo de mensagem criado/atualizado com sucesso!')->success();

        return redirect()->route('admin.downloadfiles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $downloadfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($downloadfile)
    {
        
        $downloadfile = $this->downloadfile->find($downloadfile);

        $downloadfile->delete();

        flash('Arquivo excluído com sucesso!')->success();

        return redirect()->route('admin.downloadfiles.index');

    }
}
