<div>
    <div class="d-flex align-items-center justify-content-between">
        <ul class="d-flex gap-2">
            <li>
                <a href="{{route('neighbor.incidences')}}">Incidencias</a>
            </li>
            <li>/</li>
            <li>
                Incidencia #{{$incidence->id}}
            </li>
        </ul>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar Incidencia</button>
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">Confirmacion</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estas seguro de eliminar la incidencia #{{$incidence->id}} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" wire:click="deleteIncidence({{$incidence->id}})"  class="btn btn-danger">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 px-2">
            <img class="img-fluid w-100 rounded-3" src="
            {{
                $incidence->images->first()?->image_path
                    ? asset('storage/'.$incidence->images->first()?->image_path)
                    : asset('storage/incidences/placeholder.jpg')
            }}
            " 
            alt="">
        </div>
        <div class="col-md-6 ps-4">
            @if(session()->has('error_delete'))
                <div class="bg-danger bg-opacity-50 border-danger p-3 rounded">
                    {{session('error_delete')}} 
                </div>
            @endif
            <span class="badge 
            @if($incidence->status=="pendiente") bg-danger
            @elseif($incidence->status=="en revision") bg-warning
            @elseif($incidence->status=="en proceso") bg-secondary
            @elseif($incidence->status=="resuelta") bg-success
            @elseif($incidence->status=="cerrada") text-bg-dark
            @else bg-primary
            @endif
            py-2 px-3">{{$incidence->status}}</span>
            <p class="mt-3">{{$incidence->typeIncidence->name}}</p>
            <h3 class="fs-4">{{$incidence->description}}</h3>
            <p><i class="ri-map-pin-line"></i> {{$incidence->location}}</p>
            <p>Registrado el dia {{$incidence->created_at->format('d M Y')}}, a las {{$incidence->created_at->format('h:i')}}</p>

        </div>
    </div>
</div>
