<style>
  .background-tutti-gli-annunci{
    background-image:url('/img/sign_up_background.jpg');
    background-repeat:no-repeat;
    background-position:center;
    background-size: contain;
    position:relative;    
  }

  svg{
    display:none;
  }
  span.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md{
    display:none;
  }
  a.relative.inline-flex.items-center.px-4.py-2.ml-3.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md{
    display:none;
  }
  a.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md{
    display:none;
  }
  p.text-sm.text-gray-700{
    display:none;
  }
  div.hidden{
    display:flex!important;
    width:100%!important;
    justify-content:center;
    padding-bottom:10px;
    padding-top:10px;
  }
  div.hidden *{
    border-radius:5px!important;
    margin-left:2px;
    margin-right:2px;
  }
  span[aria-label="Next &raquo;"], span[aria-label="&laquo; Previous"]{
    display:none;
  }
  a[rel='next'], a[rel='prev']{
    display:none;
  }


</style>


<x-layout>
    
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <h2 class="mt-3 fw-bold text-main text-center">{{__('ui.all')}}
          @if (isset($category))
              <br> per: <span class="txt-secondary">{{App\Models\Category::find($category)->name}}</span>
          @endif
          @if (isset($user))
              <br> da: <span class="txt-secondary">{{App\Models\User::find($user)->name}}</span>
          @endif
          </h2>
        </div>
      </div>
      <div class="row mt-3 mb-3 background-tutti-gli-annunci">
        @foreach ($announcements as $announcement)
            <x-card :announcement="$announcement"/>
        @endforeach
     </div>
     {{ $announcements->links() }}
    </div>
</x-layout>