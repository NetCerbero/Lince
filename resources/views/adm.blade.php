<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="content-type" content="text/html;charset=utf-8" /> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Lince</title>
  <link href="vendors/%40coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  @yield('style')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
  <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
  <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
  <img class="navbar-brand-full" src={{ asset('images/logo.svg') }} width="150px" height="100px" alt="Logo lince">
  <img class="navbar-brand-minimized" src={{ asset('images/logo.svg') }} width="150px" height="100%" alt="Logo lince">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="ml-auto d-none d-lg-block">
      <h3 class="text-muted">Panel de administración Lince</h3>
  </div>
  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link nav-link pr-4" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{ asset('images/avatars/8.jpg') }}" alt="profile.pjg">
        </a>
        <div class="dropdown-menu dropdown-menu-right mr-1">
            <div class="dropdown-header text-center">
                <strong>{{ Auth::user()->name }}</strong>
            </div>
            <a class="dropdown-item" href="#">
                <i class="fa fa-user"></i> Perfil
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-lock"></i> Cerrar sesión
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </div>
    </li>
</ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="main.html">
                        <i class="nav-icon icon-speedometer"></i> Inicio
                        {{-- <span class="badge badge-info">NEW</span> --}}
                    </a>
                </li>
                <li class="nav-title">Utilidades</li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-puzzle"></i> Gestionar contenido</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="base/breadcrumb.html">
                                <i class="nav-icon icon-puzzle"></i> Peliculas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/cards.html">
                                <i class="nav-icon icon-puzzle"></i> Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/carousel.html">
                                <i class="nav-icon icon-puzzle"></i> Documentales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/collapse.html">
                                <i class="nav-icon icon-puzzle"></i> Videos musicales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/jumbotron.html">
                                <i class="nav-icon icon-puzzle"></i> Series de television</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-cursor"></i> Buttons</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="buttons/buttons.html">
                                <i class="nav-icon icon-cursor"></i> Buttons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buttons/brand-buttons.html">
                                <i class="nav-icon icon-cursor"></i> Brand Buttons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buttons/button-group.html">
                                <i class="nav-icon icon-cursor"></i> Buttons Group</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buttons/dropdowns.html">
                                <i class="nav-icon icon-cursor"></i> Dropdowns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buttons/loading-buttons.html">
                                <i class="nav-icon icon-cursor"></i> Loading Buttons
                                <span class="badge badge-danger">PRO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="nav-icon icon-pie-chart"></i> Charts</a>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon fa fa-code"></i> Editors</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="editors/code-editor.html">
                                <i class="nav-icon icon-note"></i> Code Editor
                                <span class="badge badge-danger">PRO</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editors/markdown-editor.html">
                                <i class="nav-icon fa fa-code"></i> Markdown
                                <span class="badge badge-danger">PRO</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editors/text-editor.html">
                                <i class="nav-icon icon-note"></i> Rich Text Editor
                                <span class="badge badge-danger">PRO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-title">Administración</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.index') }}">
                        <i class="nav-icon icon-puzzle"></i> Gestionar usuario
                    </a>
                    {{-- <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="base/breadcrumb.html">
                                <i class="nav-icon icon-puzzle"></i> Peliculas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/cards.html">
                                <i class="nav-icon icon-puzzle"></i> Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/carousel.html">
                                <i class="nav-icon icon-puzzle"></i> Documentales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/collapse.html">
                                <i class="nav-icon icon-puzzle"></i> Videos musicales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="base/jumbotron.html">
                                <i class="nav-icon icon-puzzle"></i> Series de television</a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <main class="main">

        <div class="breadcrumb d-flex justify-content-center">
          @yield('title')
        </div>
        <div class="container-fluid">
            <div id="ui-view">
              @yield('content')
            </div>
        </div>
    </main>
</div>
<footer class="app-footer d-flex justify-content-center">
    <div>
        <span>© 2018 BlueNet</span>
    </div>
</footer>
  <script src="vendors/jquery/js/jquery.min.js"></script>
  <script src="vendors/popper.js/js/popper.min.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendors/pace-progress/js/pace.min.js"></script>
  <script src="vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
  <script src="vendors/%40coreui/coreui-pro/js/coreui.min.js"></script>
  @yield('script')
</body>
</html>