@include("includedUI.header")

<body class="index-page sidebar-collapse">


  <!-- Navbar -->
  @include("includedUI.navbar")

  <!-- End Navb-->



  <div id="images">
    <div class="container">
      <div class="title">
        <br>
        <br>
        <br>
        <h3>
            Video Name :: {{ $showVideo->name}}
        </h3>
      <br>

      </div>

        <div class="row">
            @php
                $url =  $showVideo->youtube;
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                $youtube_id = isset($match[1]) ? $match[1] : null ;

            @endphp


            <div class="col-md-12">
                <div class="card" >

                    @if ($youtube_id == null)
                        <div class="alert alert-danger">The Youtube is empty link</div>
                    @endif

                    <div class="text-center border">
                        <iframe width="1110px" height="500" src="https://www.youtube.com/embed/{{ $youtube_id }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>

                    <div class="card-body ">

                        <div class="row">
                            <div class="col-md-6">
                                <h5><i class="fa fa-user text-danger"></i> User Email :: {{$showVideo->user->email}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fa fa-youtube text-danger fa-md"></i> Video Name:: {{$showVideo->name}}</h5>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <h5> <i class="fa fa-calendar text-danger"></i> Created At :: {{$showVideo->created_at->toFormattedDateString()}}</h5>
                            </div>

                            <div class="col-md-6">
                                <h5>
                                    <a href="{{ route("UI.category",['id' => $showVideo->category_id]) }}">
                                        <span class="badge badge-pill badge-danger ">{{$showVideo->category->name}}</span>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <h5>Tags</h5>
                        @foreach ($showVideo->tags as $tag)

                           <a href="{{ route("UI.tag",['id' => $tag->id]) }}">
                               <span class="badge badge-pill badge-danger ">{{$tag->name}}</span>
                            </a>

                        @endforeach

                    </div>

                    <div class="card-body">
                        <h5>Skills</h5>
                        @foreach ($showVideo->skills as $skill)

                            <a href="{{ route("UI.skill",['id' => $skill->id]) }}">
                                <span class="badge badge-pill badge-danger ">{{$skill->name}}</span></a>

                        @endforeach

                    </div>


                    <div class="card-body alert alert-danger">
                        <h5>Comments ( {{ $showVideo->comment->count() }} )</h5>
                        <div class="card-body">
                            @foreach ($showVideo->comment as $comments)

                            @if ($comments->comment == null)

                            @else

                               <p>
                                    <i class="fa fa-user text-dark"></i>
                                     <a href="{{ route("UI.profile",['email' => $comments->user->email])}}">{{$comments->user->email}}</a>
                                            ==> {{$comments->comment}}
                                </p><hr>

                            @endif

                            @endforeach

                        </div>

                        <form action="{{ route('comment.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="video_id" value="{{$showVideo->id }}">
                            <div class="form-group">
                                <label for="exampleInputname1">Add Comment</label>
                                <input name="comment" type="text" value="{{old('comment')}}" class="form-control {{$errors->has('comment')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Add Comment">
                                <br>
                                <input type="submit" class="btn btn-danger" value="Add Comment">

                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>





    </div>
  </div>
</div>


    @include("includedUI.footer")

