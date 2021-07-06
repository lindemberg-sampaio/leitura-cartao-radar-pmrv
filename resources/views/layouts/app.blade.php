<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sis240</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"  style="margin-bottom: 20px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Sis240</a>
        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/opm*')) active @endif" href="{{route('admin.opm.index')}}">OPM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/users*')) active @endif" href="{{route('admin.users.index')}}">Policiais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admin/downloadfiles*')) active @endif" href="{{route('admin.downloadfiles.index')}}">Upload Radar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <span class="nav-link active">{{auth()->user()->warname}}</span>
                        </li>
                    </ul>
                    <a class="btn btn-outline-warning" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>
                    
                    <form action="{{route('logout')}}" class="logout" method="post" style="display: none;">
                        @csrf
                    </form>
                    
                </div>
            </div>
        @endauth
    </div>
    </nav>
    
    
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>