<x-layout>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <h1>PRESTO!</h1>
</x-layout>