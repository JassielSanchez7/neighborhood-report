@extends('layouts.neighbor.auth')

@section('title','Login | Reporte Vecinal')

@section('content')

    <div class="bg-img img-login">

    </div>
    <div class="form-wrap">
        <div class="form-inner">

            
            <div class="icon-login">
                <i class="ri-login-box-fill"></i>
            </div>
            <h1 class="title">Iniciar Sesion</h1>
            <p class="text-center mb-4">Introduzca sus datos para acceder</p>
            
            <form action="{{route('login')}}" method="post">
                @csrf
                @method('post')
                

                

                <div class="mb-4">
                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="email" name="email" value="{{old('email')}}" required class="form-control" placeholder="Jose Perez" id="email" aria-describedby="emailHelp">
                    @error('email')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" minlength="7" name="password" id="password" class="form-control" required placeholder="**********">
                    @error('password')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>



                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary w-100">
                        Iniciar Sesion
                    </button>
                </div>

                <div class="mb-2">
                    No tienes una cuenta? <a href="{{route('register')}}">Registrate</a>
                </div>

               


            </form>

        </div>
    </div>

@endsection

