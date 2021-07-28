<x-layout>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="container-fluid">
        <header class="row align-items-center">
            <div id="header-txt">
                <h1>PRESTO!</h1>
                <h5>Ché oggi è già domani!</h5>
                <a class="chevron" href="#annunci"><i class="fas fa-chevron-circle-down"></i></a>
            </div>
        </header>
    </div>
    <div id="annunci" class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
                <x-card :announcement="$announcement"/>
            @endforeach
        </div>
    </div>
</x-layout>