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
            overflow-y: scroll;
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
            height:200px;
            overflow-x:auto;
        }
        .revisor-card{
            height:100%;
            max-height:100%;
            width:150px;
            margin-left:2px;
            margin-right:2px;
            flex-shrink:0;
        }
        .summary{
            width: calc(100% - 500px);
            background-position:80% 80%;
            background-size: 500px;
            background-repeat:no-repeat;
        }
        .footnote{
            font-size:.7em;
            font-style: italic;
        }
        .wrapper a:link{
            color:var(--main-color)!important;
            text-decoration: none;
        }
        .wrapper a:hover{
            color:var(--secondary);
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
        <div class="row justify-content-center">
            
            {{-- RIEPILOGO --}}
            @php
            $bg = $user->img ? Storage::url($user->img) : '/img/layout/avatar_male.jpeg';
            @endphp
            <div class="col-12 col-md-6 col-lg-5">
                <div class="summary w-100" style="background-image:linear-gradient(rgba(255, 255, 255, 0.801), rgba(255, 255, 255, 0.747)), url({{$bg}})">
                    <h2 class="text-center">Riepilogo</h2>
                    <div class="statistics">
                        <p><strong class="footnote">Nome:</strong><br>{{$user->name}}</p>
                        <p><strong class="footnote">e-mail:</strong><br><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                        <p><strong class="footnote">ruolo:</strong><br>{{($user->id == 1) ? 'Admin' : ($user->is_revisor ? 'Staff (Revisore)' : 'Utente')}}</p>
                        <p><strong class="footnote">Iscritto dal:</strong><br>{{$user->created_at->format('d/m/Y')}}</p>
                        <p><strong class="footnote">Annunci pubblicati:</strong><br>{{App\Models\Announcement::where('user_id', $user->id)->count()}}</p>
                        
                        @if ($user->is_revisor)
                        <p><strong class="footnote">Annunci moderati:</strong><br>{{App\Models\Moderation::where('revisor_id', $user->id)->where('status',1)->count()+
                            App\Models\Moderation::where('revisor_id', $user->id)->where('status',0)->count()}}</p>
                        @endif
                    </div>
                    {{-- STAFF --}}
                    <hr class="w-75 mx-auto mt-5 d-lg-none">
                </div>
                @if ($user->is_revisor)
                    <form action="{{route('admin.removeRevisor', $user->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <button class="w-100 btn btn-outline-danger">Rimuovi revisore</button>
                    </form> 
                @else
                    <form action="{{route('admin.makeRevisor', $user->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <button class="w-100 btn btn-outline-main">Rendi revisore</button>
                    </form>
                @endif
            </div>
            
            {{-- UTENTI --}}
            
            
            
        </div>
    </div>
</x-layout>