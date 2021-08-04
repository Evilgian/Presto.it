
<x-layout>
    <div id="apply-txt" class="container">
        <h1 class="text-secondary text-center mb-3">Inviaci la tua candidatura</h1>
        <h4 class=" text-center apply-subtitle">Compila il form per diventare revisore!</h4>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                <form method="POST" action="{{route('application.submit')}}">
                 @csrf
                <!-- Name input -->
                <div class="form-floating mb-3">
                    <input type="text" name="name" id="floatingName" class="form-control apply-input" placeholder="Nome"/>
                    <label class="form-label text-main" for="floatingName">Nome</label>
                </div>
                <!-- Email input -->
                <div class="form-floating mb-5">
                    <input type="email" name="email" class="form-control apply-input" id="floatingMail" placeholder="Indirizzo email" />
                    <label for="floatingMail" class="text-main">Indirizzo email</label>
                </div>
                <!-- Message input -->
                <div class="form-floating mb-4">
                    <textarea class="form-control apply-input" name="message" id="floatingTextarea" rows="4" placeholder="Scrivi qui il tuo messaggio:"></textarea>
                    <label class="form-label text-main" for="floatingTextarea">Scrivi qui il tuo messaggio:</label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-main fw-bold w-100 btn-block mt-3 mb-5 border-btn-candidate">Invia candidatura</button>
                </form>
            </div>
        </div>
    </div>



</x-layout>