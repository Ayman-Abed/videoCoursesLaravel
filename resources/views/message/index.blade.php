
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
            <h1><span class="badge badge-primary">Messages Table</span> </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>






        <!-- Main content -->
    <section class="content">

          <br>

          <a href="{{route('message.addMessage')}}" style="text-decoration: none;">
            <button type="button" class="btn btn-primary text-right">Add message</button>
          </a>

          <br>
          <br>
          <br>


      <div class="row">
        <div class="col-12">


                    {{-- For success To add user --}}
          @if (session()->has('addMassage'))
              <div class="row">
                  <div class="col-md-12">

                    <div class="alert alert-success">
                      <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                      </button>
                        <strong>Notification : </strong> {{ session()->get('addMassage') }}
                    </div>
                </div>
              </div>
          @endif



          {{-- For success To add user --}}
          @if (session()->has('deleteMassage'))
              <div class="row">
                  <div class="col-md-12">

                    <div class="alert alert-success">
                      <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                      </button>
                        <strong>Notification : </strong> {{ session()->get('deleteMassage') }}
                    </div>
                </div>
              </div>
          @endif


         {{-- For success To restore user --}}
          @if (session()->has('restoreMassage'))
              <div class="row">
                  <div class="col-md-12">

                    <div class="alert alert-success"  >

                      <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                      </button>
                        <strong>Notification : </strong> {{ session()->get('restoreMassage') }}
                    </div>
                </div>
              </div>
          @endif

                {{-- For success To update user --}}
          @if (session()->has('editMassage'))
              <div class="row">
                  <div class="col-md-12">

                    <div class="alert alert-success">

                      <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                      </button>
                        <strong>Notification : </strong> {{ session()->get('editMassage') }}
                    </div>
                </div>
              </div>
          @endif







          <div class="card">
            <div class="card-header">
              <h3 class="card-title">message Table</h3>
            </div>


            <div class="card-body">
                      <!-- /.card-header -->
              @if ($messages->count() == 0)
                  <div class="alert alert-danger">
                          No message Found
                  </div>
              @else


              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Message</th>

                  <th>Created At</th>
                  <th>Change</th>
                </tr>
                </thead>
                  <tbody>
                    <?php $id = 1;?>
                    @foreach ($messages as $message)

                        <tr>
                          <td>{{$id++}}</td>
                          <td>{{$message->name}}</td>
                          <td>{{$message->email}}</td>
                          <td>{{$message->message}}</td>
                          <td>{{$message->created_at->toFormattedDateString()}}</td>
                          <td>
                              <a  style="margin: 5px ; text-decoration: none;" href="{{ route('message.edit',['id' => $message->id])}}">
                                  <i  style="color:blue;" class="fas fa-edit"></i>
                              </a>
                              <a  style="margin: 5px; text-decoration: none;" href="{{ route('message.deleteMessage',['id' => $message->id])}}">
                                  <i style="color:red;" class="fas fa-trash-alt"></i>
                              </a>
                          </td>
                        </tr>

                    @endforeach
                  </tbody>
              </table>
              @endif

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->



  </div>








  @include('includedDashboard.footer')
