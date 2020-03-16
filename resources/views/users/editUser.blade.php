
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="POST" action="{{ route('users.update',['id' => $user->id])}}">

                @csrf


                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputname1">User Name</label>
                    <input name="name" type="text" value="{{ $user->name}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="User Name">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input  name="email"  type="email"value="{{ $user->email}}" class="form-control {{$errors->has('email')}} ? 'is-danger' : ''" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password"   type="password" value="" class="form-control {{$errors->has('password')}} ? 'is-danger' : ''" id="exampleInputPassword1" placeholder="Password">
                  </div>





                  @if (Auth()->user()->hasRole("super_admin"))



                  <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Permissions</h3>


                          <ul class="nav nav-pills ml-auto p-2">

                            @foreach ($models as $index => $model)
                                <li class="nav-item {{ $index == 0 ?  'active' : ''}}"><a class="nav-link {{ $index == 0 ?  'active' : ''}}" href="#{{ $model }}" data-toggle="tab">{{ $model }}</a></li>
                            @endforeach

                          </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">

                                @foreach ($models as $index => $model)

                                    <div class="tab-pane {{ $index == 0 ?  'active' : ''}}" id="{{ $model }}">

                                        <div class="form-group">
                                            {{-- To make it like permissions create_users --}}
                                            {{-- value="create_{{ $model }} --}}


                                        @foreach ($maps as $index => $map)
                                        {{-- To make chek if have value --}}
                                        {{-- {{ $user->hasPermission($map .'_' . $model ) ? 'checked' : ''}} --}}


                                            <div class="form-check form-check-inline">
                                                <input name="permissions[]" {{ $user->hasPermission($map .'_' . $model ) ? 'checked' : ''}} value="{{ $map . '_' .  $model }}" class="form-check-input" type="checkbox" id="inlineCheckbox{{ $index }}" >
                                                <label class="form-check-label" for="inlineCheckbox{{ $index }}">{{ $map }}</label>
                                            </div>

                                        @endforeach





                                        </div>
                                    </div>

                                @endforeach



                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                      </div>
                      <!-- ./card -->
                    </div>
                    <!-- /.col -->
                  </div>

                  @else

                  @endif






                </div>









                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Edit User">
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
