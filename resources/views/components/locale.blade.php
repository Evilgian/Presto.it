<form method="POST" action="{{route('locale', $lang)}}">
    @csrf
        <button type="submit" class="nav-link">
            <span class="flag-icon flag-icon-{{$nation}}"></span>
        </button>
</form>