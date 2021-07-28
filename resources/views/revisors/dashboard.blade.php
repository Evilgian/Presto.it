<x-layout>
    <style><!-- Slider main container -->
        .swiper-container {
            width: 80%;
            height: 100px !important;
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
    </style>
    <div class="container pt-3">
        <h3 class="mt-5">Pending...</h3>
        <div class="row mb-5" style="height:500px">
            <!-- Slider main container -->
            <div class="swiper-container mySwiperPending">
                <div class="swiper-wrapper">
                    @foreach ($pending as $announcement)
                    <div class="swiper-slide border">
                        <div class="card h-100 w-100">
                            <img src="https://via.placeholder.com/250" class="h-50 img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->description}}</p>
                                <a href="{{route('revisor.panel', $announcement)}}" class="btn btn-primary">Modera</a>
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


        <h3>Cestino</h3>
        <div class="row" style="height:300px">
            <!-- Slider main container -->
            <div class="swiper-container mySwiperRejected">
                <div class="swiper-wrapper">
                    @foreach ($rejected as $announcement)
                    <div class="swiper-slide border m-0">
                        <div class="swiper-slide border">
                            <div class="card h-100 w-100">
                                <img src="https://via.placeholder.com/250" class="h-50 img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary">Vedi</a>
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
    
    
    <script>
        var swiper = new Swiper(".mySwiperPending", {
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

        var swiper = new Swiper(".mySwiperRejected", {
            slidesPerView:1,
            spaceBetween:20,
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