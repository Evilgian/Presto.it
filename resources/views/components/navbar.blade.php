<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homepage')}}">Presto!</a>
        <a href="{{route('announcement.create')}}">
            <button class="btn btn-new">{{__('ui.new')}}</button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="fas fa-ellipsis-v"></i>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
               


                {{-- <li class="nav-item">
                    <form method="POST" action="{{route('locale', 'it')}}">
                        @csrf
                            <button type="submit" class="nav-link btn">
                                <span class="flag-icon flag-icon-it"></span>
                            </button>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{route('locale', 'en')}}">
                        @csrf
                            <button type="submit" class="nav-link btn">
                                <span class="flag-icon flag-icon-gb"></span>
                            </button>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{route('locale', 'es')}}">
                        @csrf
                            <button type="submit" class="nav-link btn">
                                <span class="flag-icon flag-icon-es"></span>
                            </button>
                    </form>
                </li> --}}

                <li id="navbar-search">
                    <div>
                    <form action="{{route('search')}}" method="GET" class="w-100 mx-auto">
                        <div class="input-group w-100">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                            <input type="text" name="q" class="form-control search-bar" placeholder="{{__('ui.search')}}">
                        </div>
                        <button class="btn btn-outline-main d-none" type="submit"></button>
                    </form>
                    </div>
                </li>
                
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{route('announcements.index')}}">{{__('ui.all')}}</a>
                </li>
                <li class="nav-item dropdown mx-1">
                        
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.categories')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $c)
                        <li><a class="dropdown-item" href="{{route('announcements.index', $c->id)}}">{{$c->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">{{__('ui.login')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}" tabindex="-1" aria-disabled="true">{{__('ui.signUp')}}</a>
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
                        <li><a class="dropdown-item" href="{{route('user.show')}}">{{__('ui.user')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('user.announcements')}}">{{__('ui.yourAds')}}</a></li>
                        @if(Auth::user()->is_revisor)
                        <li id="dashboard"><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard</a>
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
                 {{-- MENU LINGUA --}}
                 <li class="nav-item dropdown mx-1">
                        
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu" style="min-width:40px!important" aria-labelledby="navbarDropdown">
                        <li class="nav-item">
                            <form method="POST" action="{{route('locale', 'it')}}">
                                @csrf
                                    <button type="submit" class="nav-link btn">
                                        <span class="flag-icon flag-icon-it"></span>
                                    </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{route('locale', 'en')}}">
                                @csrf
                                    <button type="submit" class="nav-link btn">
                                        <span class="flag-icon flag-icon-gb"></span>
                                    </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{route('locale', 'es')}}">
                                @csrf
                                    <button type="submit" class="nav-link btn">
                                        <span class="flag-icon flag-icon-es"></span>
                                    </button>
                            </form>
                        </li>
                    </ul>
                </li>
                {{-- FINE MENU LINGUA --}}
            </ul>
        </div>
    </div>
</nav>