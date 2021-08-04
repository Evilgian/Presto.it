<x-layout>
  
  <div class="container pt-3 min-vh-100">
    <div class="row">
      <div class="col-12">
        <h2 class="mt-5 fw-bold text-main text-center">Annuncio da approvare</h2>
      </div>
        @if ($announcement)
        
        <div class="row shadow border p-3 mt-5">
          {{-- <!-- SLIDESHOW -->
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
          </div> --}}

          <div class="col-12 col-md-5 text-center revisor-wrapper">
            @if(count($announcement->images))
              @foreach($announcement->images as $image)
                <div class="row">
                  <div class="col-5">
                    <img src="{{$image->getUrl(500, 500)}}" class="img-fluid">
                  </div>
                  <div class="col-7 text-start">
{{-- ACCORDION --}}
                    <div class="accordion" id="accordion{{$loop->index}}">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$loop->index}}">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                            Accordion Item #1
                          </button>
                        </h2>
                        <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion{{$loop->index}}">
                          <div class="accordion-body">
                            Adult: {{$image->adult}} <br>
                            Spoof: {{$image->spoof}} <br>
                            Medical: {{$image->medical}} <br>
                            Violence: {{$image->violence}} <br>
                            Racy: {{$image->racy}} <br>
                          </div>
                        </div>
                      </div>
                    </div>
{{-- END ACCORDION --}}


                    







                    @if ($image->labels)
                      <hr class="mb-0">
                      <div class="text-muted mb-3" style="font-size:.8em">
                      @foreach ($image->labels as $label)
                         {{$label}} | 
                      @endforeach
                      </div> 
                    @endif
                    
                  </div>
                </div>
              @endforeach
            @else
              <img src="https://via.placeholder.com/500" class="img-fluid">
            @endif
          </div>
      
          <!-- RIEPILOGO -->
          <div class="col-12 col-md-7">
              <div class="row h-100 flex-column">
                  <div class="col-12">
                      <a href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
                      <div>Autore: {{$announcement->user->name}}</div>
                      <div>{{$announcement->created_at->format('d/m/Y')}} alle {{$announcement->created_at->format('H:i')}}</div>
                      <h2>{{$announcement->title}}</h2>
                      <h4>€ {{number_format($announcement->price, 2, ',', '.');}}</h4>
                  </div>
                  <div class="col-12 lead">
                    <h3 class="mt-1">Descrizione</h3>
                      {{$announcement->description}}
                  </div>
              </div>

          
          </div>
      </div>
      <div class="row">
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
              <i class="far fa-times-circle me-2"></i>Rifiuta
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