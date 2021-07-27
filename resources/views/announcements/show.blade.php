<x-layout>
    <div class="container">
        <div class="row">
            <!-- SLIDESHOW -->
            <div class="col-12 col-md-7 carousel text-center">
                <div class="swiper-container main-slider loading">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/237/200/300)">
                          <img src="https://picsum.photos/id/237/200/300" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                          <span class="caption"></span>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/238/200/300)">
                          <img src="" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                          <span class="caption"></span>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/239/200/300)">
                          <img src="" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                          <span class="caption"></span>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/240/200/300)">
                          <img src="" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                          <span class="caption"></span>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/241/200/300)">
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
                  <div class="swiper-container nav-slider loading">
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
                          <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLWTdaX3J5b1VueDg" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/239/200/300)">
                          <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLRml1b3B6eXVqQ2s" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/240/200/300)">
                          <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLVUpEems2ZXpHYVk" class="entity-img" />
                        </figure>
                        <div class="content">
                          <p class="title"></p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url(https://picsum.photos/id/241/200/300)">
                          <img src="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLNXBIcEdOUFVIWmM" class="entity-img" />
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
            <div class="col-12 ">
                <h3>Descrizione</h3>
                {{$announcement->description}}
            </div>
        </div>
    </div>
</x-layout>