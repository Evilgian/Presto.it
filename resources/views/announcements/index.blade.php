<x-layout>
    
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <h2 class="mt-5 fw-bold text-main text-center">{{__('ui.all')}}</h2>
        </div>
      </div>
      <div class="row mt-5">
        @foreach ($announcements as $announcement)
            <x-card :announcement="$announcement"/>
        @endforeach
     </div>
    </div>
</x-layout>