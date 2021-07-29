<style>
    /* .card-header{
        
        background-color:var(--main-color)!important;
        border:2px solid var(--main-color);
        color:var(--secondary)!important;
        /* color:white !important; */

        /* background:linear-gradient(90deg, #004b57, #ff9e00); */
        border-bottom:none;

 

    }

    .card-body{
        background-color: transparent;
        border:2px solid var(--main-color);
        

    }

    #container-card a{
        color: var(--secondary);
        /* color:white; */
        
    }

    .btn_details{
    border: 2px solid var(--main-color) !important;
    border-radius:10px !important;
    font-weight: bold !important;
    color:var(--main-color) !important;
    

    }

    .btn_details:hover{
        color:var(--secondary) !important;
    }

    .card-footer{
        background-color:var(--main-color)!important;
        /* background:linear-gradient(90deg, #004b57, #ff9e00); */
        border:2px solid var(--main-color);
        border-top:none;
        
        color:var(--secondary);
        font-weight:bold;



    }

    .card-title{
        color:var(--main-color)!important;
        font-weight:bold;

    }

    .rounded{
        border-radius:50% !important;
    }

     */



</style>


<div class="mb-5 col-12 col-md-4 mt-3 container-fluid cont_card" id="container-card">
    @php
        $max_length = 60;
    @endphp
        <div class="card h-100">
            <div class="card-header bg-main">
                <a class="category-link text-main" href="{{route('announcements.index', $announcement->category->id)}}">{{$announcement->category->name}}</a>
            </div>
            <div class="card-body bg-acc">
                <div class="row">
                    <div class="col-6">
                        <h5 class="h3 fw-bold text-sec card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{strlen($announcement->description)<$max_length ? $announcement->description : substr($announcement->description, 0, ($max_length-3)).'...'}}</p>
                        <a href="{{route('announcement.show', $announcement)}}" class="btn btn-outline-main btn_details text-acc">Dettagli</a>
                    </div>
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            <div class="card-footer bg-main text-end">
                {{$announcement->created_at->format('d/m/Y')}}
            </div>
        </div>
</div>