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
                <x-card
                title="{{$announcement->title}}"
                id="{{$announcement->category->id}}"
                category="{{$announcement->category->name}}"
                description="{{$announcement->description}}"
                creation="{{$announcement->created_at->format('d/m/Y')}}"/>
            @endforeach
        </div>
    </div>
</x-layout>