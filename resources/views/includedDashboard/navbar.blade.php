  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   
      <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
              <button class="btn btn-danger"  type="submit" >
                Logout
              </button>
          </form>
      </li>
      
    
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->