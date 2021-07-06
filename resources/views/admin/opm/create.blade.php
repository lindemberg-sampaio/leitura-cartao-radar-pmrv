@extends('layouts.app')

@section('content')
    <form action="{{route('admin.opm.store')}}" autocomplete="off" method="post">
        
        @csrf

        <div class="mb-3">
            <label class="form-label">Batalhão/Companhia/Pelotão</label>
            <input type="number" name="number" placeholder="Exemplo: 240" class="form-control @error('number') is-invalid @enderror" value="{{old('number')}}">
            @error('number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input type="text" name="address" class="form-control" value="{{old('address')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Cidade</label>
            <input type="text" name="city" class="form-control" value="{{old('city')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input type="text" name="mobilephone" class="form-control" value="{{old('mobilephone')}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
@endsection