@extends('layouts.app')

@section('content')
    <form action="{{route('admin.users.store')}}" autocomplete="off" method="post">

        @csrf

        <div class="row">
            <div class="col">
                <h4 class="text-center pb-3">Dados pessoais</h4>
                <div class="mb-3">
                    <label>Nome completo *</label>
                    <input type="text" name="name" maxlength="60" class="text-uppercase form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Data de nascimento</label>
                    <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate')}}">
                    @error('birthdate')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>CPF</label>
                    <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" value="{{old('cpf')}}">
                    @error('cpf')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>RG</label>
                    <input type="text" name="rg" class="text-uppercase form-control @error('rg') is-invalid @enderror" value="{{old('rg')}}">
                    @error('rg')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>E-mail *</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Senha *</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col">
                <h4 class="text-center pb-3">Dados profissionais</h4>
                <div class="mb-3">

                    <label>Graduação</label>
                    <select name="graduation_id" class="form-select">
                        @foreach($graduations as $graduation)
                        <option value="{{$graduation->id}}">{{$graduation->description}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label>RE *</label>
                    <input type="text" name="re" maxlength="7" class="text-uppercase form-control @error('re') is-invalid @enderror" value="{{old('re')}}">
                    @error('re')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Nome de guerra *</label>
                    <input type="text" name="warname" maxlength="15" class="text-uppercase form-control @error('warname') is-invalid @enderror" value="{{old('warname')}}">
                    @error('warname')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Data de admissão</label>
                    <input type="date" name="admissiondate" class="form-control @error('admissiondate') is-invalid @enderror">
                    @error('admissiondate')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>OPM *</label>
                    <select name="opm_id" class="form-select">
                        @foreach($opms as $opm)
                        <option value="{{$opm->id}}">{{$opm->number}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>PM da ativa? *</label>
                    <select name="activeservice" class="form-select">
                        <option value="0">Não</option>
                        <option value="1" selected>Sim</option>
                    </select>
                </div>
                
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection