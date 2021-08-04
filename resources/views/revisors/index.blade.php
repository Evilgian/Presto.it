
<x-layout>
  
  <div class="container pt-3 min-vh-100" id="dashboard-modera-bg">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="my-5 fw-bold dashboard-header text-main text-center">Annuncio da approvare</h2>
      </div>
      @if ($announcement)
      
      <div class="row revisor-row shadow  p-3 bordo-box-modera">
        
        <div class="col-12 col-md-5 text-center revisor-wrapper">
          @if(count($announcement->images))
          @foreach($announcement->images as $image)
          <div class="row mb-1">
            <div class="col-5">
              <img src="{{$image->getUrl(500, 500)}}" class="img-fluid border-img">
            </div>
            <div class="col-7 text-start">
              {{-- ACCORDION --}}
              <div class="accordion" id="accordion{{$loop->index}}">
                @php
                $likelihoodName = ['Sconosciuto', 'Altamente Improbabile', 'Improbabile', 'Possibile', 'Probabile', 'Altamente probabile'];
                $title = 'Moderazione non necessaria';
                $note = 'Niente da segnalare';
                $bg = '';
                if (max($image->adult, $image->spoof, $image->medical, $image->violence, $image->racy) > 0){
                  $note = '';
                }
                if (max($image->adult, $image->spoof, $image->medical, $image->violence, $image->racy) > 1){
                  $bg = 'moderation-warning text-light fw-bold';
                  $title = 'Moderazione suggerita';
                }
                if (max($image->adult, $image->spoof, $image->medical, $image->violence, $image->racy) > 3){
                  $bg = 'moderation-danger text-light fw-bold';
                  $title = 'Moderazione necessaria';
                }
                @endphp
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading{{$loop->index}}">
                    <button class="accordion-button  {{$bg}} collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                      {{$title}}
                    </button>
                  </h2>
                  <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion{{$loop->index}}">
                    <div class="accordion-body">
                      {{$note}}
                      @if ($image->adult > 0)
                      <span class="safe-search-{{$image->adult}}">Adult: {{$likelihoodName[$image->adult]}}</span> <br>   
                      @endif
                      @if ($image->spoof > 0)
                      <span class="safe-search-{{$image->spoof}}">Spoof: {{$likelihoodName[$image->spoof]}}</span> <br>   
                      @endif
                      @if ($image->medical >0)
                      <span class="safe-search-{{$image->medical}}">Medical: {{$likelihoodName[$image->medical]}}</span> <br>   
                      @endif
                      @if ($image->violence > 0)
                      <span class="safe-search-{{$image->violence}}">Violence: {{$likelihoodName[$image->violence]}}</span> <br>   
                      @endif
                      @if ($image->racy > 0)
                      <span class="safe-search-{{$image->racy}}">Racy: {{$likelihoodName[$image->racy]}}</span> <br>   
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              {{-- END ACCORDION --}}
              
              @if ($image->labels)
              <hr class="mb-3 text-main">
              <div class="text-main testo-labels text-muted mb-3" style="font-size:.8em">
                @foreach ($image->labels as $label)
                {{$label}} | 
                @endforeach
              </div> 
              @endif
              
            </div>
          </div>
          @endforeach
          @else
          <img src="https://via.placeholder.com/500" class="img-fluid">
          @endif
        </div>
        
        <!-- RIEPILOGO -->
        <div class="col-12 revisor-details col-md-7">
          <div class="row h-100 w-100 flex-column">
            <div class="col-12">
              <a class="txt-secondary lead" href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
              <div class="text-muted smalltext">Autore: {{$announcement->user->name}}</div>
              <div class="text-muted smalltext">{{$announcement->created_at->format('d/m/Y')}} alle {{$announcement->created_at->format('H:i')}}</div>
              <h2 class="text-main mt-2 mb-0">{{$announcement->title}}</h2>
              <h2 class="text-end txt-secondary fw-bold mt-0">€ {{number_format($announcement->price, 2, ',', '.');}}</h2>
            
              <hr width="75%" class="my-0">
              <div class="col-12">
                <h4 class="mt-1 text-main">Descrizione</h4>
                {{$announcement->description}}
              </div>
            </div>
          </div>
          
          
        </div>
      </div>




      <div class="row">
        <div class="col-12 col-md-8 col-lg-4 offset-md-2 offset-lg-4 mt-3 ">
          <div class="card-buttons d-flex justify-content-around">
            <form action="{{route('revisor.accepted', $announcement->id)}} " method="POST">
              @csrf
              <button  class="btn btn-outline-main btn-accetta" type='submit'>
                <i class="fas fa-check me-1 fw-bold"></i>Accetta</button>
              </form>
              
              <form action="{{route('revisor.rejected', $announcement->id)}} " method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-rifiuta">
                  <i class="far fa-times-circle me-2 fw-bold"></i>Rifiuta
                </button>
              </form>
            </div>
          </div>
        </div> 
        
        
        
        {{-- <div class="card">
          
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
        </div> --}}
        @else 
        <h2 class="text-center h1">Nessun annuncio da revisionare</h2>
        <h3 class="text-center">Torna alla <a class="txt-secondary text-center" href="{{route('revisor.dashboard')}}">Dashboard</a></h3>
        
        @endif 
        
      </div>
    </div>
    
  </x-layout>