<div>
    <div class="wrap-table mt-4">
        <h3 class="fs-4 mt-4">Mis Calificaciones</h3>
        <p>Visualiza todas tus calificaciones a las incidencias resueltas.</p>
        @if($ratings->count() > 0)
            <div class="table-responsive mt-4 px-2">
                <table class="table tb-inc mb-0 text-nowrap varient-table align-middle">
                    <thead>
                    <tr>
                        <th scope="col" class="px-2">
                            Calificacion
                        </th>
                        <th scope="col" class="px-2 text-muted">
                        Incidencia
                        </th>
                        <th scope="col" class="px-0 text-muted">Comentario</th>
                        
                        <th scope="col" class="px-2 text-muted text-end">
                            Fecha de Calificacion
                        </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratings as $rating)
                            <tr>
                                <td class="px-2">
                                    <div class="d-flex align-items-center">
                                        @for($i=0; $i < $rating->rating; $i++)
                                            
                                                <svg  class="text-warning" width="20" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                                                </svg>
                                            
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{'storage/'.$rating->incidence->images->first()->image_path}}" class="rounded-3" width="56"
                                        alt="flexy" />
                                        <div class="ms-3">
                                        <h6 class="mb-0 fw-bolder">{{$rating->incidence->description}}</h6>
                                        <span class="text-muted">{{$rating->incidence->location}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-0">{{$rating->comment}}</td>

                                <td class="px-2 text-dark fw-medium text-end">
                                    {{$rating->created_at->format('M d,Y')}}
                                </td>                                
                            </tr>                            
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        @else
            <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="icon-not-inc d-flex align-items-center justify-content-center">
                    <i class="ri-file-reduce-line"></i>
                </div>
                <p class="mt-3">Aun no has registrado incidencias</p>
                <a href="{{route('neighbor.incidence')}}" class="btn btn-primary">Registrar Incidencia</a>
            </div>
        @endif
    </div>
</div>
