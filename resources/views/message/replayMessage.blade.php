
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
            <h1>Update Message</h1>
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
                <h3 class="card-title">Add Message</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="POST" action="{{ route('message.replay',['id' => $message->id])}}">

                @csrf


                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputname1">Name</label>
                    <input  type="text" value="{{$message->name}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Name">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputname1">Email</label>
                    <input  type="text" value="{{$message->email}}" class="form-control {{$errors->has('email')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Email">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputname1">Message</label>
                    <input  type="text" value="{{$message->message}}" class="form-control {{$errors->has('message')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Message">
                  </div>





                    <h3>Replay Message</h3>
                    <div class="form-group">
                        <input name="replay_message" type="text"  class="form-control {{$errors->has('replay_message')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="replay_message">
                    </div>
                </div>




                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-warning" value="Replay Message">
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
