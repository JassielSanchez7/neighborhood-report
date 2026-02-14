<div>
    <h2>Dashboard</h2>
    <div class="card-body">
        <div class="row">                
            <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200"> 
                <a class="d-block nei-stat" href="#">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="text">
                            <h3 class="fs-6">Total de Incidencias</h3>
                            <p class="fs-4 fw-bold">{{$stats['total_incidences']}}</</p>
                        </div>
                        <div class="icon">
                            <i class="ri-file-edit-line"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200"> 
                <a class="d-block nei-stat" href="#">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="text">
                            <h3 class="fs-6">Incidencias Pendientes</h3>
                            <p class="fs-4 fw-bold">{{$stats['incidences_pending']}}</p>
                        </div>
                        <div class="icon">
                            <i class="ri-file-edit-line"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200"> 
                <a class="d-block nei-stat" href="#">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="text">
                            <h3 class="fs-6">Incidencias Cerradas</h3>
                            <p class="fs-4 fw-bold">{{$stats['incidences_closed']}}</</p>
                        </div>
                        <div class="icon">
                            <i class="ri-file-edit-line"></i>
                        </div>
                    </div>
                </a>
            </div>
                
                
        </div>
    </div>

    <div class="wrap-table mt-4">
        <h3 class="fs-4 mt-4">Ultima actividad</h3>
        @if($recentIncidences->count() > 0)
            <div class="table-responsive mt-4 px-2">
                <table class="table tb-inc mb-0 text-nowrap varient-table align-middle">
                    <thead>
                    <tr>
                        <th scope="col" class="px-2 text-muted">
                        Incidencia
                        </th>
                        <th scope="col" class="px-0 text-muted">Categoria</th>
                        <th scope="col" class="px-0 text-muted">
                        Estado
                        </th>
                        <th scope="col" class="px-2 text-muted text-end">
                        Fecha
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentIncidences as $incidence)
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <img src="{{'storage/'.$incidence->images->first()->image_path}}" class="rounded-circle" width="40"
                                        alt="flexy" />
                                        <div class="ms-3">
                                        <h6 class="mb-0 fw-bolder">{{$incidence->description}}</h6>
                                        <span class="text-muted">{{$incidence->location}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-0">{{$incidence->typeIncidence->name}}</td>
                                <td class="px-0">
                                <span class="badge bg-info">{{$incidence->status}}</span>
                                </td>
                                <td class="px-0 text-dark fw-medium text-end">
                                    {{$incidence->created_at->format('M d,Y')}}
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
