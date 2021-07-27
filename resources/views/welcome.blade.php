<x-layout>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <h1>PRESTO!</h1>
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
                <x-card :announcement="$announcement"/>
            @endforeach
        </div>
    </div>
</x-layout>