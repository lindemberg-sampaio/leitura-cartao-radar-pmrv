@extends('layouts.app')

@section('content')    
    <a href="{{route('admin.opm.create')}}" class="btn btn-success btn-sm" style="float: right;">Nova OPM</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>BPRv/Cia/Pel</th>
                <th>Cidade</th>
                <th>Fone</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($opms as $opm)
            <tr>
                <td>{{$opm->id}}</td>
                <td>{{$opm->number}}</td>
                <td>{{$opm->city}}</td>
                <td>{{$opm->phone}}</td>
                <td>{{$opm->mobilephone}}</td>
                <td>
                    <a href="{{route('admin.opm.edit', ['opm' => $opm->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <div class="btn-group">
                        <form action="{{route('admin.opm.destroy', ['opm' => $opm->id])}}" method="post">
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
    {{$opms->links()}}
@endsection