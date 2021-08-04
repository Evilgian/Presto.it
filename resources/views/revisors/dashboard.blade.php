<x-layout>
    
    <div class="container-fluid pb-5" id="dashboard-view">
        <div class="container pt-3">
            @if(count($pending))
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-3 fw-bold text-main text-center">La tua Dashboard</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h3 class="mt-5 text-main fw-bold text-center">Pending...</h3>
                </div>
            </div>
            <div class="row mb-5 row-slider-pending" style="height:500px">    
                <!-- Slider main container -->
                <div class="col-12 d-flex justify-content-center h-slider">
                    <div class="swiper-container mySwiperPending ">
                        <div class="swiper-wrapper ">
                            @foreach ($pending as $announcement)
                            <div class="swiper-slide border border-slide">
                                <div class="card h-100 w-100 bordo-card">
                                    <img src="
                                    {{
                                        count($announcement->images) ? Storage::url($announcement->images[0]->file) : 'https://via.placeholder.com/250'
                                    }}
                                    " class="h-50 img-fluid" alt="...">
                                    <div class="card-body d-flex flex-column justify-content-around align-items-center">
                                        <h3 class="card-title fs-4 text-main fw-bold">{{$announcement->getTitle()}}</h3>
                                        <p class="card-text fs-6">{{$announcement->getPreview()}}</p>
                                        <a href="{{route('revisor.panel', $announcement)}}"
                                        class="btn btn-outline-main w-50 text-main fw-bold">Modera</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row mb-3">
                <div class="col-12">
                    <h3 class="mt-5  text-main text-center fw-bold">Cestino</h3>
                </div>
            </div>
            <div class="row" style="height:300px">
                <!-- Slider main container -->
                <div class="swiper-container mySwiperRejected h-slider-bin">
                    <div class="swiper-wrapper trash-wrapper">
                        @foreach ($rejected as $announcement)
                        <div class="swiper-slide mx-1 p-0 ">
                            <div class="swiper-slide">
                                <div class="card h-100 w-100 bordo-card">
                                    <img src="
                                    {{
                                        count($announcement->images) ? Storage::url($announcement->images[0]->file) : 'https://via.placeholder.com/150'
                                    }}
                                    " class="h-50 img-fluid" alt="...">
                                    <div class="card-body d-flex flex-column justify-content-around align-items-center">
                                        <h5 class="card-title text-main fw-bold">{{$announcement->title}}</h5>
                                        <a href="{{route('announcement.show', $announcement)}}" class="btn btn-outline-main w-50 text-main fw-bold">Vedi</a>
                                        <form class="w-50" action="{{route('revisor.undo', ['id'=>$announcement->id, 'path'=>'dash'])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-100 btn btn-outline-warning">Ripristina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
        var swiperPending = new Swiper(".mySwiperPending", {
            slidesPerView:1,
            spaceBetween:10,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 40
                }
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },    
        });
        
        var swiperRejected = new Swiper(".mySwiperRejected", {
            slidesPerView:1,
            spaceBetween:10,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 40
                }
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },    
        });
    </script>
</x-layout>