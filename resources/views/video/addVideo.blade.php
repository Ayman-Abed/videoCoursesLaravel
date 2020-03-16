
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



            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form method="POST" action="{{ route('video.store')}}" enctype="multipart/form-data">

                @csrf


                <div class="card-body">



                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Video  Category</label>
                      <select class="form-control" name="category_id">

                            <option>.....</option>
                          @foreach ($categories as $category)

                              <option value="{{$category->id}}">{{$category->name}}</option>

                          @endforeach

                      </select>
                    </div>



                  <div class="form-group">
                    <label for="exampleInputname1">Video Name</label>
                    <input name="name" type="text" value="{{old('name')}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Name">
                  </div>



                  <div class="form-group">
                      <label for="exampleInputPassword1">Video Description</label>
                      <textarea   name="description" value="{{old('description')}}" class="textarea" placeholder="About Blog" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"></textarea>
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
                          alt="User Image" width="100" height="100" src="{{asset('uploads/video_image/default.png')}}">



                  <br>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputname1">Video youtube</label>
                    <input name="youtube" type="text" value="{{old('youtube')}}" class="form-control {{$errors->has('youtube')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Video">
                  </div>



                  <br>

                  <div class="form-group">
                    <label for="exampleInputname1">Video Meta Keywords</label>
                    <input name="meta_keywords" type="text" value="{{old('meta_keywords')}}" class="form-control {{$errors->has('meta_keywords')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Meta Keywords">
                  </div>

                  <br>

                  <div class="form-group">
                    <label for="exampleInputname1">Video Meta Description</label>
                    <input name="meta_description" type="text" value="{{old('meta_description')}}" class="form-control {{$errors->has('meta_description')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Video Meta Description">
                  </div>




                  <br>
                  <br>




                <label class="form-check-label" for="inlineCheckbox">Select Video Skills</label>
                <br>
                <br>

                <div class="card">
                    <div class="card-body">
                        @if ($skills->count() > 0)
                            @foreach ($skills as $skill)

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="skills[]" type="checkbox" id="inlineCheckbox{{ $skill->id }}" value="{{ $skill->id }}">
                                <label class="form-check-label" for="inlineCheckbox{{ $skill->id }}">{{ $skill->name }}</label>
                            </div>
                            @endforeach


                        @else

                            <div class="alert alert-danger">
                                No skills Found :: <a href="{{ route('skill.addSkill')}}">Add Skills</a>
                            </div>
                        @endif

                    </div>
                </div>





                <label class="form-check-label" for="inlineCheckbox">Select Video Tags</label>
                <br>
                <br>

                <div class="card">
                    <div class="card-body">
                        @if ($tags->count() > 0)
                            @foreach ($tags as $tag)

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="tags[]" type="checkbox" id="inlineCheckbox{{ $tag->id+100 }}" value="{{ $tag->id }}">
                                <label class="form-check-label" for="inlineCheckbox{{ $tag->id+100 }}">{{ $tag->name }}</label>
                            </div>
                            @endforeach


                        @else

                            <div class="alert alert-danger">
                                No skills Found :: <a href="{{ route('tag.addTag')}}">Add tag</a>
                            </div>
                        @endif

                    </div>
                </div>





                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Add Video">
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
