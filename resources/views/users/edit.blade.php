          <x-layout>
        <form action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="container edit-background">
                <h2 class="text-center mb-5" id="titolo-edit-user"> Profilo Utente </h2>
                <div class="row">
                    <div class="position-relative col-12 col-md-6 text-end col-lg-4">
                        <img id="canvas" src="{{$user->img ? Storage::url($user->img) : '/img/layout/avatar_male.jpeg'}}" class="img-fluid">
                        <label class="btn btn-edit me-2" style="position:absolute; right:5%; bottom: 20px;" for="img"> Modifica </label>
                        <input class="d-none" id="img" name="img" type="file">
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 box-edit-user">
                        <div class="row my-3 lead">
                            <div class="col-3 text-end text-main mb-3"><strong>Username:</strong></div>
                            <div class="col-9"><input type="text" name="name" class="edit-input" value="{{$user->name}}">  </div>
                            
                            <div class="col-3 text-end text-main"><strong>e-mail:</strong></div>
                            <div class="col-9"><input type="text" class="edit-input" name="email" value="{{$user->email}}">  </div>
                        </div>
                    </div>
                    <button type="submit" class="w-75 mx-auto mt-5 mb-5 btn btn-edit">Salva Modifiche</button>
                </div>
            </div>
        </form>
    </x-layout>