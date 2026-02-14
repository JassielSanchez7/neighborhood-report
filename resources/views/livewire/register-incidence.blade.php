<div>
    <h2>Registrar Incidencia</h2>
    @if(session()->has('incidence_success'))
        <div class="bg-success bg-opacity-50 border-success p-3 rounded">
            {{session('incidence_success')}}
        </div>
    @endif
    @if(session()->has('incidence_error'))
        <div class="bg-danger bg-opacity-50 border-danger p-3 rounded">
            {{session('incidence_error')}} 
        </div>
    @endif
    <form wire:submit.prevent="registerIncidence">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="description" class="form-label">Descripcion</label>
                        <input wire:model="description"  type="text"  required class="form-control" placeholder="Pista malograda" id="description" aria-describedby="emailHelp">
                        @error('description')
                            <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="typeIncidence" class="form-label">Tipo de Incidencia</label>
                        <select wire:model="typeIncidence"  name="typeIncidence" required class="form-select"  id="typeIncidence">
                                <option selected>Seleccionar tipo</option>
                            @foreach ($typeIncidences as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>                            
                            @endforeach
                        </select>
                        @error('typeIncidence')
                            <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="location" class="form-label">Ubicacion</label>
                        <input wire:model="location" type="text"  required class="form-control" placeholder="Av. Bolognesi" id="location">
                        @error('location')
                            <div class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="reference" class="form-label">Referencia</label>
                        <input wire:model='reference' type="text" class="form-control" placeholder="Frente al hospital" id="description" aria-describedby="emailHelp">
                        @error('reference')
                            <div class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="reference" class="form-label">Evidencias</label><br>
                    <input wire:model='evidence' class="form-control" type="file">
                    @error('evidence')
                        <div class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror

                    <div wire:loading wire:target="evidence">
                        Subiendo...
                    </div>

                    <button class="btn mt-3 w-100 btn-primary" type="submit">Registrar Incidencia</button>

                    {{-- <input type="file" id="files"
                        class="filepond"
                        name="filepond" 
                        multiple 
                        data-allow-reorder="true"
                        data-max-file-size="3MB"
                        data-max-files="3"> --}}
                </div>
            </div>
        </div>
    </form>
</div>
