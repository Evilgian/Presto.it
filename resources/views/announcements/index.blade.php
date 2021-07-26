<x-layout>
    
    <div class="container">
        <div class="row">
        @foreach ($announcements as $announcement)
            <div class="mb-5 col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-info">
                        <a href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->description}}</p>
                                <a href="#" class="btn btn-primary">Vai all'annuncio</a>
                            </div>
                            <div class="col-6">
                                <img src="https://via.placeholder.com/150" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        {{$announcement->created_at->format('d/m/Y')}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>