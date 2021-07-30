<x-layout>
  <div class="container pt-3">
    <div class="row">
      <div class="col-12">
        <h1 class="mt-5 fw-bold text-main text-center">Nuovo annuncio</h1>
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
  
    <div class="row my-5 justify-content-center">
      <div class="col-12 col-md-6 mb-5">
        <form method="POST" action="{{route('announcement.store')}}">
          @csrf
          <input type="hidden" name="secret" value="{{$secret}}">
          <div class="mb-3">
            <label for="title" class="form-label ">Titolo</label>
            <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="emailHelp">
            @error('title')
            <div>{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select id="category" name="category" class="form-select @error('category') is-invalid @enderror">
              <option value="">Seleziona una categoria</option>
              @foreach ($categories as $category)
              <option value="{{$category->id}}" {{old('category')==$category->id ? 'selected' : ''}}>
                {{$category->name}}</option>
                @endforeach
              </select>
              @error('category')
              <div>{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Descrizione</label>
              <textarea id="description" placeholder="Descrizione annuncio" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
              @error('description')
              <div>{{$message}}</div>
              @enderror
            </div>

            <div class="form-group row mb-3">
              <label for="images" class="col-12 col-form-label">Aggiungi immagini</label>
              <div class="col-12">
                <div class="dropzone" id="drophere"></div>
                @error('images')
                <div class="is-invalid" role="alert">
                  <strong>{{$message}}</strong>
                </div>
                @enderror
              </div>
            </div>
            
            <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input value="{{old('price')}}" type="number" id="price" name="price" class="form-control w-25 @error('price') is-invalid @enderror" step="0.1">
              @error('price')
              <div>{{$message}}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-main">Submit</button>
          </form>
        </div>
      </div>
    </div>
    
  </x-layout>