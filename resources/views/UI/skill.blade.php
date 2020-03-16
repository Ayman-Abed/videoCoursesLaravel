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
        <br>
        <br>
      <h3> Skill :: {{ $showVideoSkill->name}}</h3>
      <br>
      <br>
      </div>

        <div class="row">

            @foreach ($videos as $video)
                <a href="{{ route("UI.video",['id' => $video->id]) }}">
                    <div class="col-md-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" style="height:200px;" src="{{$video->image_path}}" alt="{{$video->name}}">
                            <div class="card-body">
                            <p class="card-text text-bold">{{$video->name}}</p>
                            <p class="card-text">{{$video->created_at->toFormattedDateString()}}</p>
                        </div>

                        </div>
                    </div>
                </a>

            @endforeach
        </div>




    </div>
  </div>
</div>


    @include("includedUI.footer")

