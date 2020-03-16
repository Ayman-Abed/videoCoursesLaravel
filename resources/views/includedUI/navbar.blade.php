
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg fixed-top" color-on-scroll="300">
        <div class="container">
          <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('UI.index') }}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" >
              Ayman Abed
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">



              <li class="nav-item">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                          @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ route('UI.category',['id' => $category->id]) }}">{{$category->name}}</a>
                          @endforeach
                      </div>
                    </div>
                  </div>
              </li>



              <li class="nav-item">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Skills
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                          @foreach ($skills as $skill)
                            <a class="dropdown-item" href="{{ route("UI.skill",['id' => $skill->id]) }}">{{ $skill->name }}</a>
                          @endforeach
                      </div>
                    </div>
                  </div>
              </li>



              <li class="nav-item dropdown">
                  @if (!empty(Auth()->user()->name))
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        {{ Auth()->user()->name }}
                    </a>

                  @endif

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @if (!empty(Auth()->user()->name))

                    <a class="dropdown-item" href="{{ route("UI.profile",['email' => Auth()->user()->email])}}">
                        {{ Auth()->user()->name }}
                    </a>

                    </a>

                  @endif

                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                      <button class=" dropdown-item"  type="submit" >
                        Logout
                      </button>
                  </form>


                </div>
              </li>




              <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                    Login
                </a>
              </li>



              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    Register
                </a>
              </li>

              <li>
              <form action="{{ route("UI.search")}}"  class="form-inline ml-auto border-danger" method="POST" style="margin-top: 15px" >
                @csrf
                    <div class="form-group has-white">
                      <input name="search" type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
              </li>




            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

