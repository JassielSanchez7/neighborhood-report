@extends('layouts.neighbor.auth')

@section('title','Login | Reporte Vecinal')

@section('content')

    <div class="bg-img img-reg">

    </div>
    <div class="form-wrap">
        <div class="form-inner form-inner-reg">            
            
            <div class="icon-login">
                <i class="ri-edit-2-fill"></i>
            </div>
            <h1 class="title">Registrate</h1>
            <p class="text-center mb-4">Ingresa tus datos para empezar a comprar</p>
            
            <form action="{{route('register')}}" method="post">
                @csrf
                @method('post')
                
                <div class="mb-3">
                    <label for="full_name" class="form-label">Nombre Completo</label>
                    <input type="text" name="full_name" value="{{old('full_name')}}" required class="form-control" placeholder="Jose Perez" id="email" aria-describedby="emailHelp">
                    @error('full_name')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" value="{{old('dni')}}" required class="form-control" placeholder="Jose Perez" id="dni" aria-describedby="emailHelp">
                    @error('dni')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>
                

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="email" name="email" value="{{old('email')}}" required class="form-control" placeholder="ejemplo@gmail.com" id="email" aria-describedby="emailHelp">
                    @error('email')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" minlength="7" name="password" id="password" class="form-control" required placeholder="**********">
                    @error('password')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Contraseña:</label>
                    <input type="password" minlength="7" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="**********">
                    @error('password_confirmation')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Celular:</label>
                    <input type="tel" name="phone" id="password" class="form-control" required placeholder="90022132">
                    @error('phone')
                        <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror
                </div>



                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary w-100">
                        Registrarse
                    </button>
                </div>

                <div class="mb-2">
                    Ya tienes una cuenta? <a href="{{route('login')}}">Inicia Sesion</a>
                </div>

               


            </form>

        </div>
    </div>

@endsection

