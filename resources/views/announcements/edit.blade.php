<x-layout>
    <div class="container pt-3">
        <h2>{{__('ui.modify')}}</h2>
        <form method="POST" action="{{route('announcement.update', $announcement)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>Titolo:</label>
                <input type="text" name="title" class="form-control" value="{{$announcement->title}}">
            </div>
            <div class="mb-3">
                <label>Categoria:</label>
                <select class="form-select" name="category" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $announcement->category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Prezzo:</label>
                <input type="number" name="price" class="form-control" value="{{$announcement->price}}">
            </div>
            <div class="mb-3">
                <label>Descrizione</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$announcement->description}}</textarea>
            </div>
            
            <div class="images-wrapper form-group d-flex mb-3">
                    @foreach ($announcement->images as $image)
                    <div class="image-wrapper">
                        <img src="{{$image->getUrl(150, 150)}}">
                        <label for="{{$loop->index}}"><i class="fas fa-remove removeImg"></i></label>
                    </div>
                    <input class="d-none" type="checkbox" name="remove[]" id="{{$loop->index}}" value="{{$image->id}}">
                    @endforeach
            </div>
            
            <button class="btn btn-outline-main" type="submit">Salva le modifiche</button>
        </form>
    </div>
</x-layout>