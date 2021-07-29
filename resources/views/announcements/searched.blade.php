<x-layout>
<h1>Ecco i risultati per {{$q}}</h1>
@foreach ($announcements as $announcement)
<p>{{$announcement->title}}</p>  
@endforeach

</x-layout>