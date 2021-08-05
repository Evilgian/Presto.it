<x-layout>
    <style>
        .container-bg{
            background-image:url('/img/sign_up_background.jpg');
            background-position:center;
            background-size:cover;
        }
        .container-bg>.row{
            backdrop-filter:blur(6px);
            background-color:#fffB;
        }
        .admin-users-wrapper{
            width:500px;
            position:relative;
            max-height:80vh;
            overflow-y: auto;
        }
        .admin-users-wrapper>.row{
            height:100px;
        }
        .admin-users-wrapper img{
            height:100px;
            width:100px;
            float:left;
            margin-right:4px;
        }
        .admin-staff-wrapper{
            width:100%;
            height:250px;
            overflow-x:auto;
        }
        .revisor-card{
            height:100%;
            max-height:100%;
            width:200px;
            margin-left:2px;
            margin-right:2px;
            flex-shrink:0;
            text-align:center;
        }
        .revisor-card>img{
            width:160px;
            height:160px;
            border-radius:50%;
            margin:0 auto;
        }
        .summary{
            width: calc(100% - 500px);
        }
        .footnote{
            font-size:.7em;
            font-style: italic;
        }
        .wrapper a{
            color:var(--main-color)!important;
            text-decoration: none;
        }
        .wrapper a:hover{
            color:var(--secondary)!important;
        }
        .user-row:hover{
            background-color:rgba(210, 223, 210, 0.618);
        }
        
        @media screen and (max-width: 991px){
            .admin-users-wrapper{
                width:100%;
            }
            .summary{
                width:100%;
                margin-bottom: 20px;
            }
        }
    </style>    
    <div class="container-fluid container-bg py-5">
        <div class="row">

            {{-- RIEPILOGO --}}
            <div class="summary order-1 order-lg-2">
                <h2 class="text-center">Riepilogo</h2>
                <div class="statistics lead">
                    <p><strong>Totale annunci:</strong> {{App\Models\Announcement::count()}}</p>
                    <p><strong>Staff: </strong>{{App\Models\User::where('is_revisor', true)->count()-1}}</p>
                    <p><strong>Totale utenti:</strong> {{App\Models\User::count()-1}} <span class="text-muted footnote">*include utenti revisori</span></p>
                </div>

            {{-- STAFF --}}
                <h2>Staff</h2>
                <div class="admin-staff-wrapper wrapper">
                    <div class=" h-100 d-flex">
                    @foreach ($users as $user)
                        @if ($user->is_revisor && $user->id != 1)
                        <a href="{{route('admin.userprofile', $user->id)}}">
                            <div class="revisor-card">
                                <img src="{{$user->img ? Storage::url($user->img) : '/img/layout/avatar_male.jpeg'}}" class="img-fluid">
                                <h5 class="text-center">{{$user->name}}</h5>
                                <form action="{{route('admin.removeRevisor', $user->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <button class="w-100 btn btn-outline-danger">Rimuovi revisore</button>
                                </form> 
                            </div>  
                        </a>                          
                        @endif
                    @endforeach
                        </div>
                </div>
                <hr class="w-75 mx-auto mt-5 d-lg-none">
            </div>
            
            {{-- UTENTI --}}
            <div class="admin-users-wrapper wrapper order-2 order-lg-1">
                <h2 class="text-center">Utenti</h2>
                @foreach($users as $user)
                @if (!$user->is_revisor)
                <a href="{{route('admin.userprofile', $user->id)}}">
                    <div class="row user-row">
                        <div class="col-12 border">
                            <img src=" {{$user->img ? Storage::url($user->img) : '/img/layout/avatar_male.jpeg'}} " class="rounded-circle" ></span>
                            <span>
                                <h5>{{$user->name}}</h5>
                                <div class="smalltext">Iscritto dal: {{$user->created_at->format('d/m/Y')}}</div>
                                <form action="{{route('admin.makeRevisor', $user->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <button class="w-50 btn btn-outline-main">Rendi revisore</button>
                                </form> 
                            </span>
                        </div>
                    </div>
                </a>      
                @endif
                @endforeach
            </div>

            

        </div>
    </div>
</x-layout>