<x-layout>
    @if(session('message'))
        <div class="alert alert-success my-0">
            {{session('message')}}
        </div>
    @endif
    <div class="container-fluid">
        <header class="row align-items-center">
            <div id="header-txt">
                <h1>PRESTO!</h1>
                <h5 class="font-weight-bold">Ché oggi è già domani!</h5>

                        
                       <form action="{{route('search')}}" method="GET" class="mt-5">
                            <input type="text" name="q" class="form-control-lg form-control w-75 search-bar" placeholder="Guarda che bello!">
                            <button class="btn btn-outline-main" type="submit">Cerca</button>
                        </form>

                        
                        


                <a class="chevron" href="#annunci"><i class="fas fa-chevron-circle-down"></i></a>
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