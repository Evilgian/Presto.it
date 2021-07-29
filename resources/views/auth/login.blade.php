
<x-layout>
    <div class="container-fluid" id="login_container">
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4 col_form">
                
                <h1 class="text-main mt-3">LOGIN</h1>
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-main">Email address</label>
                        <input type="email" name="email" class="form-control login_input" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-main">Password</label>
                        <input type="password" name="password" class="form-control login_input" id="exampleInputPassword1">
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-outline-main btn_sign_up mt-5 mx-auto">Submit</button></div>
                    
                </form>
                <div class="text-main text-center mt-3">Nuovo utente? <a  class="" href="{{route('register')}}">Registrati!</a></div>
            </div>


        </div>


     </div>
    
    
</x-layout>