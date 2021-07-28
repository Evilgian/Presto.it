<x-layout>
  
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Annunci da approvare</h2>
        
        @if ($announcement)
        
        
        <div class="card">
          
          <div class="card-body">
            <p>{{$announcement->user->name}}</p>
            <p> {{$announcement->title}}</p>
            <p>{{$announcement->description}}</p>
          </div>
          
          <div class="card-buttons">
            <form action="{{route('revisor.accepted', $announcement->id)}} " method="POST">
              @csrf
              <button type='submit'>Accetta</button>
            </form>
            
            <form action="{{route('revisor.rejected', $announcement->id)}} " method="POST">
              @csrf
              <button type='submit'>Rifiuta</button>
            </form>
          </div>
        </div>
        @else 
        <h2>Nessun annuncio da revisionare</h2>
        
        @endif 
        
      </div>
    </div>
  </div>
</x-layout>