






    <div class="section landing-section">
        <div class="container">
          <div class="row">







            <div class="col-md-8 ml-auto mr-auto">
              <h2 class="text-center">Keep in touch?</h2>
                <br>
                <br>
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


              <form class="contact-form" method="POST" method="POST" action="{{ route('message.store')}}">

                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <label>Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="nc-icon nc-single-02"></i>
                        </span>
                      </div>
                      <input  name="name" type="text" value="{{old('name')}}" class="form-control  {{$errors->has('name')}} ? 'is-danger' : '' " placeholder="Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="nc-icon nc-email-85"></i>
                        </span>
                      </div>
                      <input name="email" type="text" value="{{old('email')}}" class="form-control {{$errors->has('email')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Email">
                    </div>
                  </div>
                </div>
                <label>Message</label>
                <textarea name="message"  value="{{old('message')}}" class="form-control {{$errors->has('message')}} ? 'is-danger' : ''"   rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                <div class="row">
                  <div class="col-md-4 ml-auto mr-auto">
                    <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>



    <footer class="footer footer-black  footer-white ">
        <div class="container">
          <div class="row">
            <nav class="footer-nav">
              <ul>

                @foreach ($pages as $page)

                    <li>
                        <a href="{{ route('UI.page',['slug' => $page->slug])}}" >{{ $page->name }}</a>
                    </li>
                @endforeach


              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
      <!--   Core JS Files   -->
      <script src="{{ asset('UI/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
      <script src="{{ asset('UI/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
      <script src="{{ asset('UI/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
      <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
      <script src="{{ asset('UI/assets/js/plugins/bootstrap-switch.js')}}"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
      <script src="{{ asset('UI/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
      <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
      <script src="{{ asset('UI/assets/js/plugins/moment.min.js')}}"></script>
      <script src="{{ asset('UI/assets/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
      <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
      <script src="{{ asset('UI/assets/js/paper-kit.js?v=2.2.0')}}" type="text/javascript"></script>
      <!--  Google Maps Plugin    -->
      <script>
        $(document).ready(function() {

          if ($("#datetimepicker").length != 0) {
            $('#datetimepicker').datetimepicker({
              icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
              }
            });
          }

          function scrollToDownload() {

            if ($('.section-download').length != 0) {
              $("html, body").animate({
                scrollTop: $('.section-download').offset().top
              }, 1000);
            }
          }
        });
      </script>
  </body>

  </html>
