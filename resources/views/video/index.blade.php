
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
            <h1><span class="badge badge-primary">video Table</span> </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>






        <!-- Main content -->
    <section class="content">

          <br>

          <a href="{{route('video.addVideo')}}" style="text-decoration: none;">
            <button type="button" class="btn btn-primary text-right">Add video</button>
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



        {{-- For success To update user --}}
        @if (session()->has('publisedVideo'))
            <div class="row">
                <div class="col-md-12">

                <div class="alert alert-success">

                    <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                    </button>
                    <strong>Notification : </strong> {{ session()->get('publisedVideo') }}
                </div>
            </div>
            </div>
        @endif










          <div class="card">
            <div class="card-header">
              <h3 class="card-title">video Table</h3>
            </div>


            <div class="card-body">
                      <!-- /.card-header -->
              @if ($videos->count() == 0)
                  <div class="alert alert-danger">
                          No video Found
                  </div>
              @else


              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>User Add</th>
                  <th>Category</th>
                  <th>Published</th>
                  <th>Created At</th>
                  <th>Change</th>
                </tr>
                </thead>
                  <tbody>
                    <?php $id = 1;?>
                    @foreach ($videos as $video)

                        <tr>
                          <td>{{$id++}}</td>
                          <td>
                            <img class="img-fluid img-thumbnail image_preview"
                              alt="User Image" width="100" height="100" src="{{$video->image_path}}">

                          </td>


                          <td>{{$video->name}}</td>
                          <td>{{$video->user->name}}</td>
                          <td>{{$video->category->name}}</td>

                          <td>
                            @if ($video->published == "1")
                                <a href="{{ route('video.notPublished',['id' => $video->id])}}">
                                  <span class="badge badge-success">Published</span>
                                <a>

                            @else
                                <a href="{{ route('video.published',['id' => $video->id])}}">
                                  <span class="badge badge-danger">not Published</span>
                                <a>

                            @endif
                          </td>


                          <td>{{$video->created_at->toFormattedDateString()}}</td>

                          <td>
                              <a  style="margin: 5px ; text-decoration: none;" href="{{ route('video.edit',['id' => $video->id])}}">
                                  <i  style="color:blue;" class="fas fa-edit"></i>
                              </a>
                              <a  style="margin: 5px; text-decoration: none;" href="{{ route('video.deleteVideo',['id' => $video->id])}}">
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
