<x-layout>
  <div class="container pt-5">
    @if($announcement->is_accepted === NULL)
    <div class="alert alert-warning">Il tuo annuncio è in corso di moderazione </div>
    @endif
    @if($announcement->is_accepted === 0)
    <div class="alert alert-danger d-flex flex-wrap justify-content-between">
      <div class="">Questo annuncio è stato rifiutato perché non conforme ai termini della community</div>
      @if (Auth::user()->is_revisor)
      <form action="{{route('revisor.undo', $announcement->id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">Undo</button>
      </form>
      @endif
      
    </div>
    @endif
    <div class="row mt-5">
      <!-- SLIDESHOW -->
      <div class="col-12 col-md-7 carousel text-center ">
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
            <a href="{{route('announcements.index', $announcement->category->id)}}" class="txt-secondary">{{$announcement->category->name}}</a>
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
      <a class="col-auto d-inline" href="{{route('announcement.edit', $announcement)}}"><button class="btn btn-outline-main">Modifica</button></a>
      
      
      {{-- OFF CANVAS (Delete) --}}
      <button class="col-auto btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="fas fa-trash"></i> Elimina</button>
      
      <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title fw-bolder text-danger" id="offcanvasBottomLabel">Eliminazione annuncio</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body lead">
          Procedere all'eliminazione dell'annuncio? L'azione è irreversibile
        </div>
        <form class="text-center" action="{{route('announcement.destroy', $announcement)}}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" class="mb-5 btn btn-outline-danger">
            <i class="fas fa-trash"></i> Elimina
          </button>
        </form>
      </div>
      
    </div>
  </div>
</x-layout>