<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $path_logo = url("../storage/app/public/images/logo.png");
        $pathCss = url("css");
        $pathJs = url("js");
        $pathAppJs = url("../resources/js/app.js");
        $path_jquery_mask = url("../resources/js/bibliotecas/jquery.mask.min.js");
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Editora Adonis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{$pathCss}}/app.css">
    <link type="text/css" rel="stylesheet" href="{{$pathCss}}/form.css">
    <link type="text/css" rel="stylesheet" href="{{$pathCss}}/style.css">
    <link type="text/css" rel="stylesheet" href="{{$pathCss}}/book/form.css">
    @yield('style')
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#"><img src="{{$path_logo}}" class="logo-adonis" alt="Logo Adonis"></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>{{Auth::user()->name}}</strong>
                        </span>
                        <span class="user-role">
                            @if(Auth::user()->level == 1)
                                Administrador
                            @elseif(Auth::user()->level == 2)
                                Escola
                            @elseif(Auth::user()->level == 3)
                                Professor
                            @elseif(Auth::user()->level == 4)
                                Usuário Comum
                            @endif
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        @if(Auth::user()->level == 1)
                        <li class="sidebar-dropdown">
                            <a href="{{url('/school')}}">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Escolas</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="{{url('/user')}}">
                                <i class="fas fa-user"></i>
                                <span>Usuários</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-arrow-circle-down"></i>
                                <span>Downloads</span>
                            </a>
                        </li>
                        @elseif(Auth::user()->level == 2)
                        <li class="sidebar-dropdown">
                            <a href="{{url('/teacher')}}">
                                <i class="fas fa-user"></i>
                                <span>Professores</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="{{url('/schoolclass')}}">
                                <i class="fas fa-users"></i>
                                <span>Turmas</span>
                            </a>
                        </li>
                        @elseif(Auth::user()->level == 3)
                        <li class="sidebar-dropdown">
                            <a href="{{url('/book')}}">
                                <i class="fas fa-book"></i>
                                <span>Livros</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>      
            <!-- sidebar-menu  -->
            </div>
        </nav>
        <div id="content" class="content-wrapper">
            <div class="container">
                <div class="card ">
                    <div class="card-header text-center">
                        <h5>@yield('title')</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <p>{{Session::get('success')}}</p>
                            </div>
                        @endif
                        @if(Session::get('warning'))
                            <div class="alert alert-warning" role="alert">
                                <p>{{Session::get('warning')}}</p>
                            </div>
                        @endif
                        @if(Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <p>{{Session::get('error')}}</p>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                    @if (trim($__env->yieldContent('footer')))
                        <div class="card-footer">
                            @yield('footer')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{$pathAppJs}}"></script>
    <script src="{{$pathJs}}/book/image-resize.min.js"></script>
    <script src="{{$pathJs}}/book/image-drop.min.js"></script>
    <script src="{{$path_jquery_mask}}"></script>
    <script>var main_url="{{url('')}}"</script>
    @yield('script')
</body>
</html>