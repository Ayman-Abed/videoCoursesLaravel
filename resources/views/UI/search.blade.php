@include("includedUI.header")

<body class="index-page sidebar-collapse">



    @include("includedUI.navbar")









  <div class="page-header section-dark" style="background-image: url({{ asset('UI/assets/img/antoine-barres.jpg')}})">
    <div class="filter"></div>
    <div class="content-center">
      <div class="container">
        <div class="title-brand">
          <h1 class="presentation-title">Ayman</h1>
          <div class="fog-low">
            <img src="{{ asset('UI/assets/img/fog-low.png')}}" alt="">
          </div>
          <div class="fog-low right">
            <img src="{{ asset('UI/assets/img/fog-low.png')}}" alt="">
          </div>
        </div>
        <h2 class="presentation-subtitle text-center">Developed by Full Stack web Developer :: Laravel</h2>
      </div>
    </div>
    <div class="moving-clouds" style="background-image: url({{ asset('UI/assets/img/clouds.png')}}); "></div>

  </div>



  <div id="images">
    <div class="container">
      <div class="title">
      <h3>Result Serach :: {{ $search_title}}</h3>
      </div>

        <div class="row">

            @foreach ($video_searchs as $video_search)
                <a href="{{ route("UI.video",['id' => $video_search->id]) }}">
                    <div class="col-md-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" style="height:200px;" src="{{$video_search->image_path}}" alt="{{$video_search->name}}">
                            <div class="card-body">
                                <p class="card-text">{{$video_search->name}}</p>
                                <p class="card-text">{{$video_search->created_at->toFormattedDateString()}}</p>
                                <a href="{{ route("UI.category",['id' => $video_search->category_id]) }}">
                                    <button type="button" class="btn btn-warning btn-round">{{ $video_search->category->name }}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                {{ $video_searchs->links() }}
            </div>
        </div>


        @if ($video_searchs->count() == 0 )

        <div class="row text-center">
          <div class="col-md-12">
              <div class="alert alert-danger">No Video Found</div>
          </div>
        </div>
        @endif



    </div>
  </div>
</div>







    @include("includedUI.footer")

