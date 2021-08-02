<style>
    header {
    position: relative;
    height: calc(100vh - 58px);
    background-image: url("/img/layout/header_bello.jpg") !important;
    background-size: cover;
    background-position: center;
    margin-bottom: 30px;
}



</style>



<x-layout>
    {{-- {{dd(Request::getPreferredLanguage())}} --}}
    @if(session('message'))
    <div class="alert alert-success my-0">
        {{session('message')}}
    </div>
    @endif
    <div class="container-fluid">
        <header class="row align-items-center">
            <div id="header-txt">
                <h1>PRESTO!</h1>
                <h5 class="font-weight-bold text-main">{{__('ui.welcome')}}</h5>
                
                
                <form action="{{route('search')}}" method="GET" class="w-75 mx-auto mt-5">
                    
                    <div class="input-group">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                        <input type="text" name="q" class="form-control-lg form-control search-bar" placeholder="{{__('ui.find')}}">
                    </div>
                    <button class="btn btn-outline-main d-none" type="submit">Cerca</button>
                </form>
                
                
                
                
                
                <div class="chevron-container text-center">
                    <a class="chevron" href="#annunci">
                        <i class="fas fa-chevron-circle-down"></i>
                    </a>
                </div>
            </div>
        </header>
    </div>
    <div id="annunci" class="container pt-5 mt-2">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-main fw-bold">Ultimi annunci</h2>
            </div>
            @foreach ($announcements as $announcement)
            <x-card :announcement="$announcement"/>
            @endforeach
        </div>
    </div>
</x-layout>