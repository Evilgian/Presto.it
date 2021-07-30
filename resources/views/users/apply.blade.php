<x-layout>
    <div id="apply-txt" class="container mt-3">
        <h1 class="txt-secondary text-center mb-3">Inviaci la tua candidatura</h1>
        <h4 class="txt-secondary text-center">Compila il form per diventare revisore!</h4>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                <form method="POST" action="{{route('application.submit')}}">
                 @csrf
                <!-- Name input -->
                <div class="form-floating mb-3">
                    <input type="text" name="name" id="floatingName" class="form-control" placeholder="Nome"/>
                    <label class="form-label" for="floatingName">Nome</label>
                </div>
                <!-- Email input -->
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingMail" placeholder="Indirizzo email" />
                    <label for="floatingMail">Indirizzo email</label>
                </div>
                <!-- Message input -->
                <div class="form-floating mb-4">
                    <textarea class="form-control" name="message" id="floatingTextarea" rows="4" placeholder="Scrivi qui il tuo messaggio:"></textarea>
                    <label class="form-label" for="floatingTextarea">Scrivi qui il tuo messaggio:</label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-main fw-bold w-100 btn-block mb-4">Invia candidatura</button>
                </form>
            </div>
        </div>
    </div>



</x-layout>