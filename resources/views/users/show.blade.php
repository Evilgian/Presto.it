<x-layout>
    <div id="user-head" class="container">
        <h2 class="text-center mb-5">Il tuo profilo</h2>
        <div class="row d-flex justify-content-between">
            <div class="col-7 col-md-6 col-lg-6">
                <img src="{{$user->img ? Storage::url($user->img) : '/img/layout/avatar_male.jpeg'}}" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 col-lg-6 border rounded">
                <div class="row my-3 lead">
                    <div class="col-3 mb-3 text-end"><strong>Username:</strong></div>
                    <div class="col-8 text-end">{{$user->name}}</div>
                    
                    <div class="col-3 text-end"><strong>e-mail:</strong></div>
                    <div class="col-8 text-end">{{$user->email}}</div>

                </div>
            </div>
            <a class="mx-auto w-75" href="{{route('user.edit')}}"><button class="w-100 mt-2 btn btn-modify fw-bold">Modifica</button></a>
        </div>
    </div>

</x-layout>