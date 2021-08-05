
<div class="col-12 col-md-4 mt-5 mb-5 container-fluid cont_card" id="container-card">
    @php
        $max_length = 60;
    @endphp
        <div class="card card-index h-100 mt-3 mb-5 bg-white">
            <div class="card-header bg-white d-flex justify-content-between txt-secondary mt-2 mx-1 pb-0">
                <a class='txt-secondary' href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
                <p>{{$announcement->created_at->format('d/m/Y')}}</p>
            </div>
            <div class="card-body d-flex flex-column justify-content-around align-items-center px-3 mt-0 pt-0">
              <img src="{{count($announcement->images) ? ($announcement->images[0]->getUrl(500, 500)) : 'https://via.placeholder.com/500'
                    }}" class="img-fluid">
                <h5 class="h3 fw-bold text-main pt-3 text-center">{{$announcement->title}}</h5>
                <p class="card-text">{{$announcement->getPreview()}}</p>
                <h4>€{{$announcement->price}}</h4>
                <a href="{{route('announcement.show', $announcement)}}" class="btn btn-card-index">{{__('ui.details')}}</a>
            </div>
            <div class="card-footer bg-white text-end text-muted">
                <a class="txt-secondary" href="{{route('user.announcements', $announcement->user->id)}}">{{$announcement->user->name}}</a>
            </div>
        </div>
</div>

