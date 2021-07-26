<x-layout>
    
    <div class="container">
        <div class="row">
        @foreach ($announcements as $announcement)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        {{$announcement->}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>