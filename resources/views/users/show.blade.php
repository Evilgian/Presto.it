<x-layout>
    <div class="container">
        <h2 class="text-center mb-5"> Profilo Utente </h2>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <img src="{{$user->img ? Storage::url($user->img) : '/img/layout/avatar_male.jpeg'}}" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row my-3 lead">
                    <div class="col-3 text-end mb-3"><strong>Username:</strong></div>
                    <div class="col-9">{{$user->name}}</div>
                    
                    <div class="col-3 text-end"><strong>e-mail:</strong></div>
                    <div class="col-9">{{$user->email}}</div>

                </div>
            </div>
            <a class="mx-auto w-75" href="{{route('user.edit')}}"><button class="w-100 mt-2 btn btn-warning">Modifica</button></a>
        </div>
    </div>

</x-layout>