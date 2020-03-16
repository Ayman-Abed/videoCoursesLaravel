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
        <h3>Latest Videos</h3>
      </div>

        <div class="row">

            @foreach ($videos as $video)
                <a href="{{ route("UI.video",['id' => $video->id]) }}">
                    <div class="col-md-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" style="height:200px;" src="{{$video->image_path}}" alt="{{$video->name}}">
                            <div class="card-body">
                                <p class="card-text">{{$video->name}}</p>
                                <p class="card-text">{{$video->created_at->toFormattedDateString()}}</p>
                                <a href="{{ route("UI.category",['id' => $video->category_id]) }}">
                                    <button type="button" class="btn btn-warning btn-round">{{ $video->category->name }}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                {{ $videos->links() }}
            </div>
        </div>


        @if ($videos->count() == 0 )

        <div class="row text-center">
          <div class="col-md-12">
              <div class="alert alert-danger">No Video Found</div>
          </div>
        </div>
        @endif



    </div>
  </div>
</div>



<div class="main" style="margin-top: 80px;">

    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title">Let's talk about us</h2>
        <div class="row">

          <div class="col-md-3">
            <div class="card  card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Video</h4>
                    <h4 class="card-category">{{ $videos->count() }}</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>


          <div class="col-md-3">
            <div class="card  card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Category</h4>
                    <h4 class="card-category">{{ $categories->count() }}</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>


          <div class="col-md-3">
            <div class="card card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Tags</h4>
                    <h4 class="card-category">{{ $tags->count() }}</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card  card-plain">
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Skills</h4>
                    <h4 class="card-category">{{ $skills->count() }}</h4>
                  </div>
                </a>
              </div>
            </div>
          </div>





        </div>
      </div>
    </div>

  </div>




    @include("includedUI.footer")

