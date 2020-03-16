
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
            <h1>Add Page</h1>
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
                <h3 class="card-title">Add Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="POST" action="{{ route('page.store')}}">

                @csrf


                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputname1">Page Name</label>
                    <input name="name" type="text" value="{{old('name')}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Category Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputname1">Page  Description</label>
                    <input name="description" type="text" value="{{old('description')}}" class="form-control {{$errors->has('description')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Category Description">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputname1">Page Meta Keywords</label>
                    <input name="meta_keywords" type="text" value="{{old('meta_keywords')}}" class="form-control {{$errors->has('meta_keywords')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Category Meta Keywords">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputname1">Page Meta Description</label>
                    <input name="meta_description" type="text" value="{{old('meta_description')}}" class="form-control {{$errors->has('meta_description')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Category Meta Description">
                  </div>




              




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Add Category">
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
