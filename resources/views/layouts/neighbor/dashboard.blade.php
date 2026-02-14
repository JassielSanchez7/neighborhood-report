<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Reporte Vecinal')</title>

    {{-- iconos remixicon  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    
    {{-- Libreria para Drop and Drag  --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.js" defer></script>
 
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- lib toastr para alertas --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles()
</head>
<body>

    <div class="d-flex">
        <aside id="sidebar">
            <div class="sidebar-logo">
                <a href="#" class="d-flex align-items-center">
                    <img src="" alt="" width="50">
                    <h2>Municipalidad La Victoria</h2>
                </a>                
            </div>
            <ul class="sidebar-nav list-menu">
                <li class="sidebar-header">
                    Gestion de Incidencias
                </li>
                <li class="sidebar-item">
                    <a href="{{route('neighbor.dashboard')}}" class="sidebar-link {{ request()->routeIs('neighbor.dashboard') ? 'active' : '' }}">
                        <i class="ri-home-2-line"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('neighbor.incidence')}}" class="sidebar-link {{ request()->routeIs('neighbor.incidence') ? 'active' : '' }}">
                        <i class="ri-file-upload-line"></i>
                        <span>Nuevo Reporte</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('neighbor.incidences')}}" class="sidebar-link {{ request()->routeIs('neighbor.incidences') ? 'active' : '' }}">
                        <i class="ri-file-paper-2-line"></i>
                        <span>Historial</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('neighbor.ratings')}}" class="sidebar-link {{ request()->routeIs('neighbor.ratings') ? 'active' : '' }}">
                        <i class="ri-feedback-line"></i>
                        <span>Calificaciones</span>
                    </a>
                </li>
                <li class="sidebar-header">
                    Usuario
                </li>
                {{-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="true" aria-controls="auth">
                        <i class="ri-git-repository-private-fill"></i>
                        <span>Perfil</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Registrate</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="sidebar-item">
                    <a href="{{route('neighbor.profile')}}" class="sidebar-link">
                        <i class="ri-id-card-line"></i>
                        <span>Perfil</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="ri-folder-user-fill"></i>
                        <span>Personal</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="ri-folder-user-fill"></i>
                        <span>Archivo Plano</span>
                    </a>
                </li>
                <li class="sidebar-header">
                    Cuenta
                </li> --}}
                <li class="sidebar-item">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="sidebar-link">
                            <i class="ri-expand-left-line"></i>
                            <span>Cerrar Sesion</span>
                        </button>
                    </form>
                </li>
            </ul>

            
        </aside>
        <div id="sidebar-overlay"></div>

        <div class="main">
            <nav class="navbar navbar-perfil navbar-expand border-bottom justify-content-between">
                <button class="toggler-btn" type="button">
                    <i class="ri-menu-fold-line"></i>
                </button>
                <div class="links-right d-flex">
                    <div class="wrap-noti">
                        <i class="ri-notification-2-fill"></i>
                    </div>
                    <div class="wrap-perfil d-flex align-items-center justify-content-center">
                        <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false" >
                            {{ strtoupper(
                                substr(auth('neighbor')->user()->full_name, 0, 1) .
                                substr(strstr(auth('neighbor')->user()->full_name, ' '), 1, 1)
                            ) }}
                        </a>
                        <ul class="list-perfil dropdown-menu dropdown-menu-end">
                            <li><button class="dropdown-item" type="button">Mi Perfil</button></li>
                            <li><button class="dropdown-item" type="button">Cerrar Sesion</button></li>
                            {{-- <li><button class="dropdown-item" type="button">Something else here</button></li> --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="p-3">
                <div class="container-fluid">
                    {{$slot}}          
                </div>
            </main>
        </div>
    </div>


    
    @livewireScripts
</body>
</html>