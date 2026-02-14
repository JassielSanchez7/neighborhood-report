<div>
    <div class="row">
    {{-- sidebar --}}
        <div class="col-md-4">
            <div class="bg-white rounded shadow-sm p-3">
                <div class="d-flex flex-column align-items-center text-center mb-3">
                    <div class="icon-profile  d-flex align-items-center  justify-content-center">
                        {{ strtoupper(
                                substr(auth('neighbor')->user()->full_name, 0, 1) .
                                substr(strstr(auth('neighbor')->user()->full_name, ' '), 1, 1)
                            ) }}
                    </div>
                    <h2 class="fw-semibold fs-3 text-secondary-emphasis">{{auth('neighbor')->user()->full_name}}</h2>
                    <p class="pb-0 mb-0">{{auth('neighbor')->user()->email}}</p>
                    <p class="fw-medium p-0 m-0">{{auth('neighbor')->user()->dni}}</p>
                </div>
                <div class="border-top pt-3">
                    <p>Miembro desde</p>
                    <p class="fw-medium">{{auth('neighbor')->user()->created_at->format('M d,Y')}}</p>
                </div>
            </div>
        </div>

        {{-- Main Content  --}}
        <div class="col-md-8">
            {{-- Profile Information  --}}
            <div class="bg-white rounded shadow-sm p-4">

                <h2 class="fs-4">Informacion de Perfil</h2>
                @if(session()->has('profile_success'))
                    <div class="bg-success bg-opacity-50 border-success p-3 rounded">
                        {{session('profile_success')}}
                    </div>
                @endif
                @if(session()->has('profile_error'))
                    <div class="bg-danger bg-opacity-50 border-danger p-3 rounded">
                        {{session('profile_error')}} 
                    </div>
                @endif

                <form wire:submit="updateProfile">
                    <div class="mb-3">
                        <label class="block form-label">Nombre Completo</label>
                        <input type="text" wire:model="full_name" class="form-control">
                        @error('name') <span class="text-danger fw-medium">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block form-label">Email</label>
                        <input type="email" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger fw-medium">{{$message}}</span> @enderror
                    </div>


                    

                    {{-- <div class="row">
                        <div class="col-6">
                            <label class="block fw-medium text-primary-emphasis">Fecha de Cumpleaños</label>
                            <input type="date" wire:model="date_of_birth" class="w-100 px-3 py-1 rounded border border-secondary">                            
                        </div>
                        <div class="col-6">
                            <label class="block fw-medium text-primary-emphasis">Genero</label>
                            <select wire:model="gender" class="w-100 px-3 py-1 rounded border border-secondary">
                                <option value="">Seleccionar</option>
                                <option value="male">Masculino</option>
                                <option value="female">Femenino</option>
                            </select>                            
                        </div>
                    </div> --}}

                    <button type="submit" class="mt-3 w-100 btn btn-primary">Actualizar Perfil</button>

                </form>

            </div>

            {{-- Change Password  --}}
            <div class="bg-white rounded shadow-sm p-4 mt-3">
                <h2 class="fs-4">Cambiar Contraseña</h2>
                @if(session()->has('password_success'))
                    <div class="bg-success bg-opacity-50 border-success p-3 rounded">
                        {{session('password_success')}} esto
                    </div>
                @endif

                @if(session()->has('password_error'))
                    <div class="bg-danger bg-opacity-50 border-danger p-3 rounded">
                        {{session('password_error')}} 
                    </div>
                @endif

                <form wire:submit="updatePassword">
                    <div class="mb-3">
                        <label class="block form-label">Actual Contraseña</label>
                        <input type="password" wire:model="current_password" class="form-control">                            
                        @error('current_password') <span class="text-danger fw-medium">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="block form-label">Nueva Contraseña</label>
                        <input type="password" wire:model="new_password" class="form-control">                            
                        @error('new_password') <span class="text-danger fw-medium">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="block form-label">Confirmar nueva Contraseña</label>
                        <input type="password" wire:model="new_password_confirmation" class="form-control">                            
                        @error('new_password_confirmation') <span class="text-danger fw-medium">{{$message}}</span> @enderror
                    </div>

                    <button type="submit" class="mt-3 w-100 btn btn-primary">Cambiar Contraseña</button>
                    
                </form>
                
            </div>

           

            



        </div>
    </div>
</div>
