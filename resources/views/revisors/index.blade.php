<x-layout>
  
  <div class="container pt-3 min-vh-100">
    <div class="row">
      <div class="col-12">
        <h2 class="mt-5 fw-bold text-main text-center">Annunci da approvare</h2>
      </div>
        @if ($announcement)
        
        <div class="row mt-5">
          <!-- SLIDESHOW -->
          <div class="col-12 col-md-7 carousel text-center">
              <div class="swiper-container show main-slider loading">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/237/500/500)">
                        <img src="https://picsum.photos/id/237/500/500" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/238/500/500)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/239/500/500)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/240/500/500)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/241/500/500)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                        <span class="caption"></span>
                      </div>
                    </div>
                  </div>
                  <!-- If we need navigation buttons -->
                  <div class="swiper-button-prev swiper-button-white"></div>
                  <div class="swiper-button-next swiper-button-white"></div>
                </div>
                
                <!-- Thumbnail navigation -->
                <div class="swiper-container show nav-slider loading">
                  <div class="swiper-wrapper" role="navigation">
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/237/200/300)">
                        <img src="https://picsum.photos/id/237/200/300" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/238/200/300)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/239/200/300)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/240/200/300)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/241/200/300)">
                        <img src="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title"></p>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
      
          <!-- RIEPILOGO -->
          <div class="col-12 col-md-5">
              <div class="row h-100 flex-column justify-content-between">
                  <div class="col-12">
                      <a href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
                      <div>{{$announcement->created_at->format('d/m/Y')}} alle {{$announcement->created_at->format('H:i')}}</div>
                      <h2>{{$announcement->title}}</h2>
                      <h4>€ {{number_format($announcement->price, 2, ',', '.');}}</h4>
                  </div>
                  <div class="col-12">
                      <div class="row align-items-center">
                          <div class="col-3">
                            <img src="{{$announcement->user->img ? Storage::url($announcement->user->img) : '/img/layout/avatar_male.jpeg'}}" class="rounded-circle img-fluid">
                          </div>
                          <div class="col-9">
                              <h4>{{$announcement->user->name}}</h4>
                          </div>
                      </div>
                  </div>
              </div>

          
          </div>
      </div>
      <div class="row">
        <div class="col-12 lead mt-3 ">
            <h3>Descrizione</h3>
            {{$announcement->description}}
        </div>
       <div class="col-7 mt-3 ">
        <div class="card-buttons d-flex justify-content-around">
          <form action="{{route('revisor.accepted', $announcement->id)}} " method="POST">
            @csrf
            <button  class="btn btn-outline-main" type='submit'>
              <i class="fas fa-check me-1"></i>Accetta</button>
          </form>
          
          <form action="{{route('revisor.rejected', $announcement->id)}} " method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
              <i class="fas fa-trash me-2"></i>Rifiuta
            </button>
            {{-- <button type='submit' class="btn btn-main">Rifiuta</button> --}}
          </form>
        </div>
       </div>
      </div> 
        
    
        
        {{-- <div class="card">
          
          <div class="card-body">
            <p>{{$announcement->user->name}}</p>
            <p> {{$announcement->title}}</p>
            <p>{{$announcement->description}}</p>
          </div>
          
          <div class="card-buttons">
            <form action="{{route('revisor.accepted', $announcement->id)}} " method="POST">
              @csrf
              <button type='submit'>Accetta</button>
            </form>
            
            <form action="{{route('revisor.rejected', $announcement->id)}} " method="POST">
              @csrf
              <button type='submit'>Rifiuta</button>
            </form>
          </div>
        </div> --}}
        @else 
        <h2>Nessun annuncio da revisionare</h2>
        
        @endif 
        
      </div>
    </div>
  
</x-layout>