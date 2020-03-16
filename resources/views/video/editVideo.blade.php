





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
            <h1>Add Category</h1>
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




        {{-- For success To update user --}}
        @if (session()->has('addComment'))
        <div class="row">
            <div class="col-md-12">

            <div class="alert alert-success">

                    <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                    </button>
                    <strong>Notification : </strong> {{ session()->get('addComment') }}
                </div>
            </div>
            </div>
        @endif




            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="POST" action="{{ route('video.update',['id' => $video->id])}}"  enctype="multipart/form-data">

                @csrf


                <div class="card-body">



                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Video  Category</label>
                      <select class="form-control" name="category_id">

                            <option>.....</option>
                          @foreach ($categories as $category)

                              <option {{ ($category->id == $video->category_id) ? "selected" : ''}}
                                  value="{{$category->id}}">{{$category->name}}</option>

                          @endforeach

                      </select>
                    </div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputname1">Video Name</label>
                                <input name="name" type="text" value="{{$video->name}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Name">
                              </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputname1">Video youtube</label>
                                <input name="youtube" type="text" value="{{$video->youtube}}" class="form-control {{$errors->has('youtube')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Video">
                              </div>
                        </div>

                    </div>









                  <div class="form-group">
                      <label for="exampleInputPassword1">Video Description</label>
                      <textarea   name="description" value="{{$video->description}}" class="textarea" placeholder="About Blog" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;">{{$video->name}}</textarea>
                  </div>


                 <label for="exampleInputname1">Video Image</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input name="image" type="file" class="custom-file-input image" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>

                  <br>



                  <img class="img-fluid img-thumbnail image_preview"
                          alt="User Image" width="100" height="100" src="{{$video->image_path}}">



                  <br>
                  <br>



                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputname1">Video Meta Keywords</label>
                            <input name="meta_keywords" type="text" value="{{$video->meta_keywords}}" class="form-control {{$errors->has('meta_keywords')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Meta Keywords">
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputname1">Video Meta Description</label>
                            <input name="meta_description" type="text" value="{{$video->meta_description}}" class="form-control {{$errors->has('meta_description')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Meta Description">
                          </div>
                    </div>
                  </div>








                  <br>
                  <br>


                  <label class="form-check-label" for="skill">Select Video skills</label>
                  <div class="card">
                    <div class="card-body">

                        @if ($skills->count() > 0)
                            @foreach ($skills as $skill )

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="skills[]" type="checkbox"
                                    id="skill{{ $skill->id }}"  value="{{ $skill->id }}"

                                    @foreach ($video->skills as $sk)

                                        @if ($skill->id == $sk->id)
                                            checked
                                        @endif

                                    @endforeach
                                    >
                                <label class="form-check-label" for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                            </div>
                            @endforeach
                        @else

                        <div class="alert alert-danger">
                            No skills Found :: <a href="{{ route('skill.addSkill')}}">Add Skills</a>
                        </div>
                        @endif

                        </div>
                    </div>

                    <br>
                    <br>



                  <label class="form-check-label" for="tags">Select Video Tags</label>
                  <div class="card">
                    <div class="card-body">

                        @if ($tags->count() > 0)
                            @foreach ($tags as $tag )

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="tags[]" type="checkbox"
                                    id="tags{{ $tag->id +100 }}"  value="{{ $tag->id }}"

                                    @foreach ($video->tags as $ta)

                                        @if ($tag->id == $ta->id)
                                            checked
                                        @endif

                                    @endforeach
                                    >
                                <label class="form-check-label" for="tags{{ $tag->id + 100}}">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                        @else

                        <div class="alert alert-danger">
                            No tag Found :: <a href="{{ route('tag.addTag')}}">Add tag</a>
                        </div>
                        @endif

                        </div>
                    </div>


                    <br>
                    <br>




                    @php


                        $url =  $video->youtube;
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                        $youtube_id = isset($match[1]) ? $match[1] : null ;

                    @endphp


                    @if ($youtube_id == null)
                        <div class="alert alert-danger">The Youtube is empty link</div>
                    @endif

                    <div class="text-center border">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtube_id }}" frameborder="0"
                          allowfullscreen></iframe>
                    </div>


                    <br>
                    <br>
                    <br>



                        <div class="alert alert-info">
                            <h5>Comments</h5>
                            <div class="table-responsive">
                                <table  class="table table-hover table-striped border ">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>User Name</td>
                                            <td>User Email</td>
                                            <td>Comment</td>
                                            <td>Created at </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $id = 0;
                                        @endphp
                                        @foreach ($comments as $comment )

                                            <tr>
                                                <td class="mailbox-name">{{ ++$id }}</td>
                                                <td class="mailbox-name">{{ $comment->user->name }}</td>
                                                <td class="mailbox-name">{{ $comment->user->email }}</td>
                                                <td class="mailbox-subject">{{ $comment->comment }}</td>
                                                <td class="mailbox-date">{{ $comment->created_at->toFormattedDateString() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="update Video">
                </div>
              </form>
              <br>


                <div class="card">
                    <div class="card-body">

                        <div class="alert alert-danger">

                        <form action="{{ route('comment.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="video_id" value="{{$video->id }}">
                            <div class="form-group">
                                <label for="exampleInputname1">Add Comment</label>
                                <input name="comment" type="text" value="{{old('comment')}}" class="form-control {{$errors->has('comment')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Add Comment">
                                <br>
                                <input type="submit" class="btn btn-warning" value="Add Comment">

                            </div>

                        </form>
                        </div>
                    </div>
                </div>




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
