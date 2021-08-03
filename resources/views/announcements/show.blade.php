<style>

  #container-dettaglio{
    background-image:url('/img/sign_up_background.jpg');
    background-repeat: no-repeat;
    background-position:center;
    background-size:cover;

  }
  
  .text-detail{
    font-weight:bold !important;
    color:var(--main-color);

  }
</style>


<x-layout>
  <div class="container pt-3" id="container-dettaglio">
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
      <div class="col-12 col-md-7 carousel text-center ">
        @if (count($announcement->images) > 1)
        <!-- SLIDESHOW -->
        <div class="swiper-container show main-slider loading">
          <div class="swiper-wrapper">
            @foreach ($announcement->images as $image )
            <div class="swiper-slide">
              <figure class="slide-bgimg" style="background-image:url({{($image->getUrl(500, 500))}})">
                <img src="{{($image->getUrl(500, 500))}}" class="entity-img" />
              </figure>
              {{-- {{dd(Storage::url($image->getUrl(500, 500)))}} --}}
              <div class="content">
                <p class="title"></p>
                <span class="caption"></span>
              </div>
            </div>
            @endforeach
          </div>
          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev swiper-button-white"></div>
          <div class="swiper-button-next swiper-button-white"></div>
        </div>
        
        <!-- Thumbnail navigation -->
        <div class="swiper-container show nav-slider loading">
          <div class="swiper-wrapper" role="navigation">
            @foreach ($announcement->images as $image)
            <div class="swiper-slide">
              <figure class="slide-bgimg" style="background-image:url({{($image->getUrl(150, 150))}})">
                <img src="{{($image->getUrl(150, 150))}}" class="entity-img" />
              </figure>
              <div class="content">
                <p class="title"></p>
              </div>
            </div>  
            @endforeach
          </div>
        </div>

        @elseif (count($announcement->images)==1)
        <img src="{{($announcement->images[0]->getUrl(500, 500))}}" class="img-fluid">

        @elseif (!count($announcement->images))
        <div><img src="https://via.placeholder.com/500/500" class="img-fluid"></div>
        @endif
      </div>
      
      
      <!-- RIEPILOGO -->
      <div class="col-12 col-md-5 bg-description">
        <div class="row h-100 flex-column justify-content-between">
          <div class="col-12">
            <a href="{{route('announcements.index', $announcement->category->id)}}" class="txt-secondary text-detail">{{$announcement->category->name}}</a>
            <div class="text-detail">{{$announcement->created_at->format('d/m/Y')}} {{__('ui.atTime')}} {{$announcement->created_at->format('H:i')}}</div>
            <h2 class="text-detail">{{$announcement->title}}</h2>
            <h4 class="text-detail">€ {{number_format($announcement->price, 2, ',', '.');}}</h4>
          </div>
          <div class="col-12">
            <div class="row align-items-center">
              <div class="col-3">
                <img src="{{$announcement->user->img ? Storage::url($announcement->user->img) : '/img/layout/avatar_male.jpeg'}}" class="rounded-circle img-fluid">
              </div>
              <div class="col-9">
                <h4 class="text-detail">{{$announcement->user->name}}</h4>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
    <div class="row">
      <div class="col-12 lead mt-3 ">
        <h3 class="text-detail">{{__('ui.description')}}</h3>
        {{$announcement->description}}
      </div>
      @if($announcement->user->id == Auth::id() || (((Auth::user()) && Auth::user()->is_revisor)))
      
      @if($announcement->user->id == Auth::id())
      <a class="col-auto d-inline" href="{{route('announcement.edit', $announcement)}}"><button class="btn btn-outline-main">{{__('ui.edit')}}</button></a>
      @endif
      
      {{-- OFF CANVAS (Delete) --}}
      <button class="col-auto btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="fas fa-trash"></i> {{__('ui.delete')}}</button>
      
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
            <i class="fas fa-trash"></i> {{__('ui.delete')}}
          </button>
        </form>
      </div>
      @endif
      
    </div>
  </div>
</x-layout>