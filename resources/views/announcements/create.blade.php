
<x-layout>
  <div class="container pt-3">
    <div class="row">
      <div class="col-12">
        <h1 class="mt-5 fw-bold text-main text-center mt-3">{{__('ui.new')}}</h1>
      </div>
    </div>
    {{-- DISPLAY VALIDATION ERRORS --}}
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif


  <div class="container-fluid create_form_bg" id="container_create">
      
    <div class="row my-5 mt-3">
      <div class="col-12 col-md-4 offset-md-4 col_form mb-5">
        <form method="POST" action="{{route('announcement.store')}}">
          @csrf
          <input type="hidden" name="secret" value="{{$secret}}">
          <div class="mb-3">
            <label for="title" class="form-label text-main ">Titolo</label>
            <input type="text" value="{{old('title')}}" class="sign_up_input form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="emailHelp">
            @error('title')
            <div>{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="category" class="form-label text-main">Categoria</label>
            <select id="category" name="category" class="sign_up_input form-select @error('category') is-invalid @enderror">
              <option value="" class="category_select text-main">-Seleziona una categoria-</option>
              @foreach ($categories as $category)
              <option class="category_select" value="{{$category->id}}" {{old('category')==$category->id ? 'selected' : ''}}>
                {{$category->name}}</option>
                @endforeach
              </select>
              @error('category')
              <div>{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label text-main">Descrizione</label>
              <textarea id="description" placeholder="Descrizione annuncio" name="description" class="sign_up_input text-main form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
              @error('description')
              <div>{{$message}}</div>
              @enderror
            </div>

            <div class="form-group row mb-3">
              <label for="images" class="col-12 col-form-label text-main">Aggiungi immagini</label>
              <div class="col-12">
                <div class="sign_up_input dropzone box_inserimento_immagini" id="drophere"></div>
                @error('images')
                <div class="is-invalid " role="alert">
                  <strong>{{$message}}</strong>
                </div>
                @enderror
              </div>
            </div>
            
            <div class="mb-3">
              <label for="price" class="form-label text-main">Prezzo   (€)</label>
              <input value="{{old('price')}}" type="number" id="price" name="price" class="text-end sign_up_input form-control w-25 @error('price') is-invalid @enderror" step="0.1">
              @error('price')
              <div>{{$message}}</div>
              @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-main btn_sign_up mt-5 mx-auto">Invia</button>

            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

    
    
  </x-layout>