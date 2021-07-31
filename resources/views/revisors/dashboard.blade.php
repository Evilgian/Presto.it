<x-layout>
    <style><!-- Slider main container -->

   
        .swiper-container {
            width: 80%;
            height: 100px !important;
        }
        
        .trash-wrapper>*{
            padding-right: 40px
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        
        .swiper-slide img {
            display: block;
            /* width: 100%;
            height: 100%; */
            object-fit: cover;
        }

        .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{
           background-color: #ff9e00; 
        }

        :root {
         --swiper-theme-color: #ff9e00;
          }


        #dashboard-view{
            background-image: url('/img/sign_up_background.jpg');
            background-size: cover;
        }
    </style>

    
    <div class="container-fluid" id="dashboard-view">
        <div class="container pt-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-5 fw-bold text-main text-center">La tua Dashboard</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h3 class="mt-5  txt-secondary text-center">Pending...</h3>
                </div>
            </div>
            <div class="row mb-5 " style="height:500px">    
                <!-- Slider main container -->
                <div class="col-12 d-flex justify-content-center">
                    <div class="swiper-container mySwiperPending">
                        <div class="swiper-wrapper">
                            @foreach ($pending as $announcement)
                            <div class="swiper-slide border">
                                <div class="card h-100 w-100">
                                    <img src="
                                        {{
                                        count($announcement->images) ? Storage::url($announcement->images[0]->file) : 'https://via.placeholder.com/250'
                                        }}
                                        " class="h-50 img-fluid" alt="...">
                                    <div class="card-body d-flex flex-column justify-content-around align-items-center">
                                        <h5 class="card-title">{{$announcement->title}}</h5>
                                        <p class="card-text">{{$announcement->getPreview()}}</p>
                                        <a href="{{route('revisor.panel', $announcement)}}"
                                        class="btn btn-outline-main w-50">Modera</a>
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
            <div class="row mb-3">
                <div class="col-12">
                    <h3 class="mt-5  txt-secondary text-center">Cestino</h3>
                </div>
            </div>
            <div class="row" style="height:300px">
                <!-- Slider main container -->
                <div class="swiper-container mySwiperRejected">
                    <div class="swiper-wrapper trash-wrapper">
                        @foreach ($rejected as $announcement)
                        <div class="swiper-slide m-0 ">
                            <div class="swiper-slide">
                                <div class="card h-100 w-100">
                                    <img src="
                                        {{
                                        count($announcement->images) ? Storage::url($announcement->images[0]->file) : 'https://via.placeholder.com/150'
                                        }}
                                        " class="h-50 img-fluid" alt="...">
                                    <div class="card-body d-flex flex-column justify-content-around align-items-center">
                                        <h5 class="card-title">{{$announcement->title}}</h5>
                                        <a href="{{route('announcement.show', $announcement)}}" class="btn btn-outline-main w-50">Vedi</a>
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