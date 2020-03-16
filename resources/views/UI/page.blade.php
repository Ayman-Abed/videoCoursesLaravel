@include("includedUI.header")

<body class="index-page sidebar-collapse">


    @include("includedUI.navbar")


  <div class="page-header section-dark" style="background-image: url({{ asset('UI/assets/img/antoine-barres.jpg')}})">
    <div class="filter"></div>
    <div class="content-center">
      <div class="container">
        <div class="title-brand">
          <h1 class="presentation-title">Paper Kit 2</h1>
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




  <div class="section">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h2 class="title">{{ $showPage->name }}</h2>
          <p class="description">{{ $showPage->description }}</p>
        </div>

      </div>

    </div>
  </div>

</div>




    @include("includedUI.footer")

