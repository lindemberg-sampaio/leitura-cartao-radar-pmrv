@extends('layouts.app')

@section('content')
    <form action="{{route('admin.downloadfiles.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        Escolha novo arquivo para upload
        <div class="row">
            <div class="col">
                <input type="file" name="filename" class="form-control" required>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-danger"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>

    <table class="table table-striped table-sm" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Arquivo</th>
                <th>Tamanho</th>
                <th>Triador</th>
                <th class="text-center">Mensagem</th>
                <th>Data de envio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($downloadfiles as $file)
            <tr>
                <td>{{$file->id}}</td>
                <td>{{$file->filename}}</td>
                <td>{{number_format($file->size, 0, '.', '.')}} KB</td>
                <td>{{$file->user->warname}}</td>
                <td class="text-center">
                    <form action="{{route('admin.downloadfiles.edit', ['downloadfile' => $file->id])}}">
                        <button type="submit" class="btn btn-sm list-group-flush text-primary">
                            @if($file->messagenumber)
                                {{$file->messagenumber}}
                            @else
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            @endif
                        </button>
                    </form>
                </td>
                <td>
                    @if($file->senddate)
                        {{date('d/m/Y', strtotime($file->senddate))}}
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.downloadfiles.show', ['downloadfile' => $file->id])}}" class="btn btn-success btn-sm"><i class="fa fa-file-text" aria-hidden="true"></i></a>
                    <div class="btn-group">
                        <form action="{{route('admin.downloadfiles.destroy', ['downloadfile' => $file->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection