@extends('layouts.app')

@section('content')
    <form action="{{route('admin.opm.update', ['opm' => $opm->id])}}" autocomplete="off" method="post">
        
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Batalhão/Companhia/Pelotão</label>
            <input type="number" name="number" class="form-control form-control" value="{{$opm->number}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input type="text" name="address" class="form-control form-control" value="{{$opm->address}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cidade</label>
            <input type="text" name="city" class="form-control form-control" value="{{$opm->city}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="phone" class="form-control form-control" value="{{$opm->phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input type="text" name="mobilephone" class="form-control form-control" value="{{$opm->mobilephone}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
@endsection