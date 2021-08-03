<x-layout>
    <div class="container pt-3">
        <h2>{{__('ui.modify')}}</h2>
        <form method="POST" action="{{route('announcement.update', $announcement)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>{{__('ui.title')}}:</label>
                <input type="text" name="title" class="form-control" value="{{$announcement->title}}">
            </div>
            <div class="mb-3">
                <label>{{__('ui.category')}}:</label>
                <select class="form-select" name="category" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $announcement->category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">{{__('ui.price')}}:</label>
                <input type="number" name="price" class="form-control" value="{{$announcement->price}}">
            </div>
            <div class="mb-3">
                <label>{{__('ui.description')}}</label>
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
            <label>{{__('ui.uploadImages')}}</label><br>
            <input type="file" name="img">
            <div class="text-center text-muted fst-italic">Le modifiche saranno definitive solo all'atto del salvataggio</div>
            
            <button class="btn btn-outline-main" type="submit">{{__('ui.save')}}</button>
        </form>
    </div>
</x-layout>