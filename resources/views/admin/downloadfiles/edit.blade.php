@extends('layouts.app')

@section('content')
    <form action="{{route('admin.downloadfiles.update', ['downloadfile' => $downloadfile->id])}}" class="form-group" autocomplete="off" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label>Nome do arquivo</label>
                    <input type="text" name="filename" class="form-control" value="{{$downloadfile->filename}}" disabled>
                </div>
                <div class="mb-3">
                    <label>Tamanho do arquivo</label>
                    <input type="text" name="size" class="form-control" value="{{number_format($downloadfile->size, 0, '.', '.')}} KB" disabled>
                </div>
                <div class="mb-3">
                    <label>Triador</label>
                    <input type="text" name="size" class="form-control" value="{{$downloadfile->user->name}}" disabled>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label>Mensagem</label>
                    <input type="text" class="form-control" name="messagenumber" value="{{$downloadfile->messagenumber}}">
                </div>
                <div class="mb-3">
                    <label>Data de envio</label>
                    <input type="date" class="form-control" name="senddate" value="{{$downloadfile->senddate}}">
                </div>
                <div class="pull-right py-4">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
                
            </div>
        </div>
    </form>
@endsection