
<div class="mb-5 col-12 col-md-4 mt-3 container-fluid cont_card" id="container-card">
    @php
        $max_length = 60;
    @endphp
        <div class="card h-100">
            <div class="card-header bg-main">
                <a class="category-link text-main" href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
            </div>
            <div class="card-body bg-acc">
                <div class="row">
                    <div class="col-6">
                        <h5 class="h3 fw-bold text-sec card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{strlen($announcement->description)<$max_length ? $announcement->description : substr($announcement->description, 0, ($max_length-3)).'...'}}</p>
                        <a href="{{route('announcement.show', $announcement)}}" class="btn btn-outline-main btn_details text-acc">Dettagli</a>
                    </div>
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            <div class="card-footer bg-main text-end">
                {{$announcement->created_at->format('d/m/Y')}}
            </div>
        </div>
</div>

