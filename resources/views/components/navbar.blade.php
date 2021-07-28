<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homepage')}}">Presto!</a>
        <a href="{{route('announcement.create')}}">
            <button class="btn btn-new">Nuovo Annuncio</button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="fas fa-ellipsis-v"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('announcements.index')}}">Tutti gli annunci</a>
                </li>
                <li class="nav-item dropdown">
                        
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $c)
                        <li><a class="dropdown-item" href="{{route('announcements.index', $c->id)}}">{{$c->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}" tabindex="-1" aria-disabled="true">Sign Up</a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                        
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                        @if(Auth::user()->is_revisor && \App\Models\Announcement::toBeRevisionedCount())
                            <span id="dropDownBadge" class="toBeRevisioned badge badge-pill badge-warning">{{\App\Models\Announcement::toBeRevisionedCount()}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('user.show')}}">Profilo</a></li>
                        <li><a class="dropdown-item" href="{{route('user.announcements')}}">I tuoi annunci</a></li>
                        @if(Auth::user()->is_revisor)
                        <li id="dashboard"><a class="dropdown-item" href="{{route('revisor.panel')}}">Dashboard</a>
                            @if(\App\Models\Announcement::toBeRevisionedCount())
                            <span class="toBeRevisioned badge badge-pill badge-warning">{{\App\Models\Announcement::toBeRevisionedCount()}}</span>
                            @endif
                        </li>
                        
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout<i class="fas fa-sign-out-alt ms-4"></i></a>
                            <form action="{{route('logout')}}" method="POST" id="logout-form">@csrf</form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>