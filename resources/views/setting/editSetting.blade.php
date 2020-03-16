
@include('includedDashboard.header')


<div class="wrapper">



    <!-- Navbar -->
    @include('includedDashboard.navbar')

    <!-- /.navbar -->




    {{-- Sidbar --}}
    @include('includedDashboard.sidbar')
    {{-- Sidbar --}}


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            @if ($errors->count() > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li >{{$error}}</li>

                    @endforeach
                </ul>
            @endif



            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="POST" action="{{ route('setting.update', ['id' =>$setting->id ])}}">

                @csrf


                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputname1">User Name</label>
                        <input name="user_name" type="text" value="{{$setting->user_name}}" class="form-control {{$errors->has('user_name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="User Name">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Name</label>
                        <input  name="blog_name"  type="text" value="{{$setting->blog_name}}" class="form-control {{$errors->has('blog_name')}} ? 'is-danger' : ''" id="exampleInputEmail1" placeholder="Blog Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Manegar</label>
                        <input name="manegar"   type="text" value="{{$setting->manegar}}" class="form-control {{$errors->has('manegar')}} ? 'is-danger' : ''" id="exampleInputPassword1" placeholder="Manegar">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">phone_number</label>
                        <input name="phone_number"   type="text" value="{{$setting->phone_number}}" class="form-control {{$errors->has('phone_number')}} ? 'is-danger' : ''" id="exampleInputPassword1" placeholder="Phone Number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Facebook</label>
                        <input name="facebook"   type="text" value="{{$setting->facebook}}" class="form-control {{$errors->has('facebook')}} ? 'is-danger' : ''" id="exampleInputPassword1" placeholder="Facebook">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">About Blog</label>
                        <textarea name="about" class="textarea" placeholder="About Blog" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;">{{$setting->about}}
                        </textarea>
                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update Setting">
                </div>

                
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
   

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  






  @include('includedDashboard.footer')
