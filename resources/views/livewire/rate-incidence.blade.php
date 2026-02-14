<div>
    <h2 class="fs-3 mb-3">Calificar Incidencia #{{$incidence->id}}</h2>
    @if(session()->has('rating_success'))
        <div class="bg-success bg-opacity-50 border-success p-3 rounded">
            {{session('rating_success')}}
        </div>
    @endif
    @if(session()->has('rating_error'))
        <div class="bg-danger bg-opacity-50 border-danger p-3 rounded">
            {{session('rating_error')}} 
        </div>
    @endif
    <form wire:submit.prevent="registerIncidence">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <p class="form-label">Descripcion de incidencia</p>
                    <p>{{$incidence->description}}</p>
                </div>
                <div class="col-sm-6">
                    <p class="form-label">Ubicacion de incidencia</p>
                    <p>{{$incidence->location}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="rating mb-3">
                        <p class="form-label">Calificacion</p>
                        <div class="d-flex align-items-center gap-1">
                            @for($i=0; $i < $this->rating; $i++)
                                <a wire:click='setRating({{$i+1}})'  href="#">
                                    <svg  class="text-warning" width="24" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                                    </svg>
                                </a>
                            @endfor
                            @for($i = $this->rating; $i < 5;$i++)
                                <a wire:click='setRating({{$i+1}})'  href="#">
                                    <svg width="24"  viewBox="0 0 24 24" fill="currentColor"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z"></path></svg>
                                </a>
                            @endfor
                        </div>
                        <span>
                            @if(!$this->rating)
                               Seleccione las estrellas segun califica la atencion
                            @elseif($this->rating==1)
                                1 estrella
                            @else
                                {{$this->rating}} estrellas
                            @endif
                        </span>
                        @error('rating')
                            <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="form-label">Comentario</label>
                        <textarea wire:model="comment" rows="4"  type="text"  required class="form-control" placeholder="La soluccion me parece ..." id="comment">
                        </textarea>
                        @error('comment')
                            <div id="emailHelp" class="form-text text-danger fw-medium">{{$message}}</div> 
                        @enderror
                        <button class="btn mt-3 w-100 btn-primary" type="submit">Calificar Incidencia</button>

                    </div>
                </div>
            </div>
            
        </div>
    </form>
</div>
