@extends('layouts.app')

@section('content')
    <form action="{{route('admin.users.update', ['user' => $user->id])}}" autocomplete="off" method="post">

        @csrf
        @method("PUT")

        <h4 class="text-center pb-3">Edição de dados</h4>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label>Nome completo *</label>
                    <input type="text" name="name" class="text-uppercase form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Data de nascimento</label>
                    <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{$user->birthdate}}">
                    @error('birthdate')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>CPF</label>
                    <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" value="{{$user->cpf}}">
                    @error('cpf')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>RG</label>
                    <input type="text" name="rg" class="form-control @error('rg') is-invalid @enderror" value="{{$user->rg}}">
                    @error('rg')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>E-mail *</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label>Graduação *</label>
                    <select name="graduation_id" class="form-select">
                        @foreach($graduations as $graduation)
                        <option value="{{$graduation->id}}"
                            @if($graduation->id === $user->graduation_id)
                                selected
                            @endif>
                            {{$graduation->description}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>RE *</label>
                    <input type="text" name="re" class="text-uppercase form-control @error('re') is-invalid @enderror" value="{{$user->re}}">
                    @error('re')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Nome de guerra *</label>
                    <input type="text" name="warname" class="text-uppercase form-control @error('warname') is-invalid @enderror" value="{{$user->warname}}">
                    @error('warname')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Data de admissão</label>
                    <input type="date" name="admissiondate" class="form-control @error('admissiondate') is-invalid @enderror" value="{{$user->admissiondate}}">
                    @error('admissiondate')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="row">                    
                    <div class="col">
                        <div class="mb-3">
                            <label>OPM *</label>
                            <select name="opm_id" class="form-select">
                                @foreach($opms as $opm)
                                    <option value="{{$opm->id}}" 
                                        @if($opm->id == $user->opm->id) 
                                            selected 
                                        @endif>{{$opm->number}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>PM da ativa? *</label>
                            <select name="activeservice" class="form-select">
                                @if($user->activeservice)
                                    <option value="0">Não</option>
                                    <option value="1" selected>Sim</option>
                                @else
                                    <option value="0" selected>Não</option>
                                    <option value="1">Sim</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>
@endsection