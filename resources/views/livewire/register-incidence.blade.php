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
                        <textarea wire:model="description" rows="3" required class="form-control" placeholder="Pista malograda" id="description" aria-describedby="emailHelp"></textarea>
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

            

            <div class="row mt-4">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="location" class="form-label">Ubicacion</label>
                        <input wire:model="location" readonly type="text"  required class="form-control" placeholder="Seleccione la ubicacion en el mapa de la parte inferior" id="location">
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

            <div class="row mb-4">
                <div class="col-sm-12">
                    <label wire:ignore id="title-location" class="form-label">Seleccione la ubicación en el mapa</label>

                    <div
                        id="map"
                        wire:ignore
                        style="height: 400px;"
                        class="border rounded"
                    ></div>

                    <input type="hidden" wire:model="latitude">
                    <input type="hidden" wire:model="longitude">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="incidence-date" class="form-label">Fecha de la Incidencia</label>
                        <input wire:model="incidenceDate" type="date"  required class="form-control" id="incidence-date" max="{{ date('Y-m-d') }}">
                        @error('incidenceDate')
                            <div class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="incidence-time" class="form-label">Hora de la Incidencia</label>
                        <input wire:model='incidenceTime' type="time" class="form-control" id="incidence-time">
                        @error('incidenceTime')
                            <div class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="reference" class="form-label">Evidencias</label><br>
                    <input wire:model='evidence' class="form-control" type="file"  accept="image/*">

                    <div wire:loading wire:target="evidence">
                        Procesando imagen...
                    </div>

                    @if ($evidence)
                        <div class="row mt-3">                        
                            <div class="col-md-3 mb-3 preview-image">

                                <img
                                    src="{{ $evidence->temporaryUrl() }}"
                                    class="img-fluid rounded shadow"
                                >

                                <button class="btn-dash" type="button" wire:click="removeImage()">
                                    <i class="ri-close-line"></i>
                                </button>

                                {{-- <p>{{ $image->getClientOriginalName() }}</p> --}}
                                
                            </div>
                        </div>
                    @endif




                    @error('evidence')
                        <div class="form-text text-danger fw-medium">{{$message}}</div> 
                    @enderror

                    {{-- <div wire:loading wire:target="evidence">
                        Subiendo...
                    </div> --}}

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

@push('scripts')
<script>
// document.addEventListener('livewire:init', () => {

//     const map = L.map('map').setView([-6.7714, -79.8409], 13);

//     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         maxZoom: 18
//     }).addTo(map);

//     let marker;

//     map.on('click', function(e) {

//         const lat = e.latlng.lat;
//         const lng = e.latlng.lng;

//         if (marker) {
//             map.removeLayer(marker);
//         }

//         marker = L.marker([lat, lng]).addTo(map);

//         @this.set('latitude', lat);
//         @this.set('longitude', lng);
//     });

// });
// 


document.addEventListener('DOMContentLoaded', function () {

    const map = L.map('map').setView([-6.7714, -79.8409], 14);
    const $titleLocation = document.getElementById("title-location");

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    let marker;

    map.on('click', async function(e) {

        let lat = e.latlng.lat;
        let lng = e.latlng.lng;
        $titleLocation.textContent = "Cargando ...";
        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker([lat, lng]).addTo(map);

        @this.set('latitude', lat);
        @this.set('longitude', lng);

        try {

            const response = await fetch(
                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`
            );

            const data = await response.json();

            console.log(data)

            if (data.address.city === "La Victoria") {
                $titleLocation.style.color = "green";
                $titleLocation.textContent = "Selecciono un lugar de La Victoria"
                console.log("Esta en la victoria");
                @this.set('location', data.name);

            }else{
                
                console.log(" No Esta en la victoria");
                @this.set('location', "");
                $titleLocation.style.color = "red";
                $titleLocation.textContent = "Por favor, seleccione una ubicacion que se encuentre en La Victoria"
            }

        } catch (error) {

            console.error('Error obteniendo dirección:', error);

        }

    });

});
</script>
@endpush
