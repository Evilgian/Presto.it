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
                <h5>Ché oggi è già domani!</h5>
                <form action="{{route('search')}}" method="GET" class="mt-5">
                    <input type="text" name="q" class="form-control-lg form-control" placeholder="Guarda che bello!">
                    <button class="btn" type="submit">Cerca</button>
                </form>
                <a class="chevron" href="#annunci"><i class="fas fa-chevron-circle-down"></i></a>
            </div>
        </header>
    </div>
    <div id="annunci" class="container pt-5 mt-2">
        <div class="row">
            @foreach ($announcements as $announcement)
                <x-card :announcement="$announcement"/>
            @endforeach
        </div>
    </div>
</x-layout>