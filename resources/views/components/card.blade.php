<div class="mb-5 col-12 col-md-4">
    @php
        $max_length = 60;
    @endphp
    <div class="card">
        <div class="card-header bg-main">
            <a class="category-link" href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
        </div>
        <div class="card-body bg-acc">
            <div class="row">
                <div class="col-6">
                    <h5 class="h3 fw-bold text-sec card-title">{{$announcement->title}}</h5>
                    <p class="card-text">{{strlen($announcement->description)<$max_length ? $announcement->description : substr($announcement->description, 0, ($max_length-3)).'...'}}</p>
                    <a href="{{route('announcement.show', $announcement)}}" class="btn btn-outline-main text-acc">Dettagli</a>
                </div>
                <div class="col-6">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded">
                </div>
            </div>
        </div>
        <div class="card-footer text-white bg-main">
            {{$announcement->created_at->format('d/m/Y')}}
        </div>
    </div>
</div>