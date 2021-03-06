<style>
  .background-tutti-gli-annunci{
    background-image:url('/img/sign_up_background.jpg');
    background-repeat:no-repeat;
    background-position:center;
    background-size: contain;
    position:relative;    
  }


</style>


<x-layout>
    
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <h2 class="mt-3 fw-bold text-main text-center">{{__('ui.all')}}</h2>
        </div>
      </div>
      <div class="row mt-3 mb-3 background-tutti-gli-annunci">
        @foreach ($announcements as $announcement)
            <x-card :announcement="$announcement"/>
        @endforeach
     </div>
    </div>
</x-layout>