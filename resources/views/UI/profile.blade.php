@include("includedUI.header")

<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  @include("includedUI.navbar")

  <!-- End Navbar -->
  <div class="page-header page-header-xs" data-parallax="true" style="background-image: url({{ asset("UI/assets/img/fabio-mangione.jpg")}});">
    <div class="filter"></div>
  </div>
  <div class="section profile-content">
    <div class="container">
      <div class="owner">
        <div class="avatar">
          <img src="{{ asset('UI/assets/img/faces/joe-gardner-2.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        </div>
        <div class="name">
          <h4 class="title">{{Auth()->user()->email}}
            <h4 class="title">{{Auth()->user()->name}}
            <br />
          </h4>
          <h6 class="description">{{Auth()->user()->roles->first()->name}}</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto text-center">
          <p>An artist of considerable range, Jane Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
          <br />
          @if (Auth()->user()->email == $userProfile->email)

            <button onclick="$('#profile').slideToggle(1000)" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Update Profile</button>
          @endif

        </div>
      </div>
      <br/>



      @if (Auth()->user()->email == $userProfile->email)


      <div class="row" id="profile" style="display:none">

          <div class="col-md-12">
            <div class="card card-nav-tabs">

                <h4 class="card-header card-header-info" style="margin-top: 10px">Update Profile</h4>

                <div class="card-body">
                <form action="{{ route('UI.updateProfile',['email' =>  Auth()->user()->email ])}}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                <input value="{{ Auth()->user()->name}}" name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                <input value="{{ Auth()->user()->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password"  name="password" class="form-control" aria-describedby="emailHelp" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 25px;">
                                    <button type="submit" class="btn btn-danger">Update Profile</button>
                                </div>
                            </div>


                        </div>


                      </form>

                </div>
              </div>
          </div>

      </div>


      @endif






    </div>
  </div>




  @include("includedUI.footer")
