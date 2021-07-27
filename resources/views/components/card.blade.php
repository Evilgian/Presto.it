<div class="mb-5 col-12 col-md-6 col-lg-4">
    <div class="card">
        <div class="card-header bg-info">
            <a href="{{route('announcements.index', $id)}}">{{$category}}</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">{{$title}}</h5>
                    <p class="card-text">{{$description}}</p>
                    <a href="#" class="btn btn-primary">Vai all'annuncio</a>
                </div>
                <div class="col-6">
                    <img src="https://via.placeholder.com/150" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            {{$creation}}
        </div>
    </div>
</div>