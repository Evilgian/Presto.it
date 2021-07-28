<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('application.submit')}}">
                 @csrf
                <!-- Name input -->
                <div class="form-outline mb-4 mt-5">
                    <label class="form-label" for="form4Example1">Name</label>
                    <input type="text" name="name" id="form4Example1" class="form-control"/>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example2">Email address</label>
                    <input type="email" name="email" id="form4Example2" class="form-control" />
                </div>
                <!-- Message input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Message</label>
                    <textarea class="form-control" name="message" id="form4Example3" rows="4"></textarea>
                </div>
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value=""
                    id="form4Example4"
                    checked
                    />
                    <label class="form-check-label" for="form4Example4">
                    Send me a copy of this message
                    </label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-main w-100 btn-block mb-4">Send</button>
                </form>
            </div>
        </div>
    </div>



</x-layout>