@extends('layouts.app')

@section('content')
    <div>
        <h5>Arquivo</h5>
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Data de envio</th>
                    <th scope="col">Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$downloadfile->id}}</td>
                    <td>{{$downloadfile->filename}}</td>
                    <td>{{number_format($downloadfile->size, 0, '.', '.')}} KB</td>
                    <td>
                        @if(strtotime($downloadfile->senddate))
                            {{date('d/m/Y', strtotime($downloadfile->senddate))}}
                        @endif
                    </td>
                    <td>{{$downloadfile->messagenumber}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5>Infrações</h5>
    <table class="table table-bordered table-striped table-hover table-sm text-center">
        <thead>
            <tr class="table-primary">
                <th scope="col">Tipo</th>
                <th scope="col">Rodovia</th>
                <th scope="col">Km</th>
                <th scope="col">Pista</th>
                <th scope="col">Data/hora</th>
                <th scope="col">Vel. permitida</th>
                <th scope="col">Vel. aferida</th>
                <th scope="col">Nº foto</th>
                <th scope="col">Policial</th>
            </tr>
        </thead>
        <tbody>
            @foreach($speedrecords as $sp)
            <tr>
                <td>{{$sp->locationtype}}</td>
                <td>{{$sp->sp}}</td>
                <td>{{$sp->km}}</td>
                <td>{{$sp->runwaysense}}</td>
                <td>
                    @if($sp->dateofinfringement)
                        {{strftime("%d/%m/%Y %H:%M:%S", strtotime($sp->dateofinfringement))}}
                    @endif
                </td>
                <td>{{$sp->allowedspeed}}</td>
                <td>{{$sp->measuredspeed}}</td>
                <td>{{$sp->photonumber}}</td>
                <td>{{$sp->policeman}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection