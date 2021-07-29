<x-layout>
    <div class="container-fluid pt-3" id="sign_up_container">
      <div class="row">
        <div class="col-12 col-md-4 offset-md-4 col_form mb-5">


          <h1 class="text-main">SIGN UP</h1>
          
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label text-main">Nome Utente</label>
                  <input type="text" id="name" name="name" class="form-control sign_up_input">
              </div>
              <div class="mb-3">
                  <label for="profile-picture" class="form-label text-main">Immagine del profilo</label>
                  <input type="file" name="img" class="form-control sign_up_input" id="profile-picture">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-main">Email address</label>
                <input type="email" name="email" class="form-control sign_up_input" id="exampleInputEmail1" aria-describedby="emailHelp">
                
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-main">Password</label>
                <input type="password" name="password" class="form-control sign_up_input" id="exampleInputPassword1">
              </div>
              <div class="mb-5">
                <label for="exampleInputPassword1" class="form-label text-main">Conferma Password</label>
                <input type="password" class="form-control sign_up_input" name="password_confirmation" id="exampleInputPassword1">
              </div>
              <div class="text-center"><button type="submit" class="btn btn-outline-main  btn_sign_up">Submit</button></div>
              
            </form>
        </div>
        </div>

      </div>
</x-layout>