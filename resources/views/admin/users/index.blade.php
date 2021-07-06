@extends('layouts.app')

@section('content')    
    <a href="{{route('admin.users.create')}}" class="btn btn-success btn-sm" style="float: right;">Novo Policial</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Graduação</th>
                <th>RE</th>
                <th>Nome de guerra</th>
                <th>Ativo</th>
                <th>OPM</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="text-uppercase">
                <td>{{$user->id}}</td>
                <td>{{$user->graduation->description}}</td>
                <td>{{$user->re}}</td>
                <td>{{$user->warname}}</td>
                <td>
                    @if ($user->activeservice)
                        <i class="fa fa-check-circle" style="color: blue;"></i>
                    @else
                        <i class="fa fa-times" style="color: red;"></i>
                    @endif
                </td>
                <td>{{$user->opm->number}}</td>
                <td>
                    <a href="{{route('admin.users.edit', ['user' => $user->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <div class="btn-group">
                        <form action="{{route('admin.users.destroy', ['user' => $user->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}

@endsection