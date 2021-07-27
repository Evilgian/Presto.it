<x-layout>
    <h1>NUOVO ARTICOLO</h1>
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
    {{-- CONFIRM REVIEW POSTED --}}
    @if(session('message'))
      <div class="col-12 col-md-6 offset-md-3 mt-5">
        <div class="alert alert-success">
        {{session('message')}}
        </div>
      </div>
    @endif

    <form method="POST" action="{{route('announcement.store')}}">
        @csrf
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
            <label for="description" class="form-label">Categoria</label>
            <textarea id="description" placeholder="Descrizione annuncio" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
            @error('description')
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input value="{{old('price')}}" type="number" id="price" name="price" class="form-control w-25 @error('price') is-invalid @enderror" step="0.1"></div>
            @error('price')
            <div>{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</x-layout>