  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
      <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('dashboard.index')}}" class="d-block">{{ Auth::user()->name}}</a>
          <a href="{{route('dashboard.index')}}" class="d-block">{{Auth()->user()->roles->first()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('dashboard.index')}}" class="nav-link active">
              <p>Dashboard</p>
            </a>

          </li>



          <li class="nav-item has-treeview {{ Request::is('admin/user/users') ? 'menu-open' : ''}} {{ Request::is('admin/user/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/user/users') ? 'active' : ''}} {{ Request::is('admin/user/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{ Request::is('admin/user/users') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li>

              @if (Auth()->user()->roles->first()->name == "super_admin")


              <li class="nav-item">
                <a href="{{route('user.trashed')}}" class="nav-link {{ Request::is('admin/user/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user-times"></i>
                  <p>Users Soft Deleted</p>
                </a>
              </li>
              @else

              <li class="nav-item ">
                <a href="" class="nav-link disabled">
                  <i class="nav-icon fas fa-user-times "></i>
                  <p>Users Soft Deleted</p>
                </a>
              </li>

              @endif
            </ul>
          </li>




          <li class="nav-item has-treeview {{ Request::is('admin/category/categories') ? 'menu-open' : ''}} {{ Request::is('admin/category/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/category/categories') ? 'active' : ''}} {{ Request::is('admin/category/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ Request::is('admin/category/categories') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>categories</p>
                </a>
              </li>

              @if (Auth()->user()->roles->first()->name == "super_admin")



              <li class="nav-item">
                <a href="{{route('category.trashed')}}" class="nav-link {{ Request::is('admin/category/trashed') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                  <p>Category Soft Deleted</p>
                </a>
              </li>

              @else

              <li class="nav-item">
                <a href="" class="nav-link disabled">
                  <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                  <p>Category Soft Deleted</p>
                </a>
              </li>



              @endif



            </ul>
          </li>





          <li class="nav-item has-treeview {{ Request::is('admin/skill/skills') ? 'menu-open' : ''}} {{ Request::is('admin/skill/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/skill/skills') ? 'active' : ''}} {{ Request::is('admin/skill/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Skills
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('skill.index')}}" class="nav-link {{ Request::is('admin/skill/skills') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>Skills</p>
                </a>
              </li>

              @if (Auth()->user()->roles->first()->name == "super_admin")

                <li class="nav-item">
                    <a href="{{route('skill.trashed')}}" class="nav-link {{ Request::is('admin/skill/trashed') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Skill Soft Deleted</p>
                    </a>
                </li>

                @else
                    <li class="nav-item">
                        <a href="" class="nav-link disabled ">
                        <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                        <p>Skill Soft Deleted</p>
                        </a>
                    </li>
                @endif


            </ul>
          </li>






          <li class="nav-item has-treeview {{ Request::is('admin/tag/tags') ? 'menu-open' : ''}} {{ Request::is('admin/tag/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/tag/tags') ? 'active' : ''}} {{ Request::is('admin/tag/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Tags
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tag.index')}}" class="nav-link {{ Request::is('admin/tag/tags') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>Tags</p>
                </a>
              </li>

              @if (Auth()->user()->roles->first()->name == "super_admin")


                <li class="nav-item">
                    <a href="{{route('tag.trashed')}}" class="nav-link {{ Request::is('admin/tag/trashed') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Tag Soft Deleted</p>
                    </a>
                </li>

              @else
                <li class="nav-item">
                    <a href="" class="nav-link disabled">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Tag Soft Deleted</p>
                    </a>
                </li>
              @endif


            </ul>
          </li>








          <li class="nav-item has-treeview {{ Request::is('admin/page/pages') ? 'menu-open' : ''}} {{ Request::is('admin/page/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/page/pages') ? 'active' : ''}} {{ Request::is('admin/page/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('page.index')}}" class="nav-link {{ Request::is('admin/page/pages') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>Pages</p>
                </a>
              </li>

              @if (Auth()->user()->roles->first()->name == "super_admin")


                <li class="nav-item">
                    <a href="{{route('page.trashed')}}" class="nav-link {{ Request::is('admin/page/trashed') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Page Soft Deleted</p>
                    </a>
                </li>

              @else
                <li class="nav-item">
                    <a href="" class="nav-link disabled">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Page Soft Deleted</p>
                    </a>
                </li>
              @endif


            </ul>
          </li>





          <li class="nav-item has-treeview {{ Request::is('admin/video/videos') ? 'menu-open' : ''}} {{ Request::is('admin/video/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/video/videos') ? 'active' : ''}} {{ Request::is('admin/video/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Video
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('video.index')}}" class="nav-link {{ Request::is('admin/video/videos') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>Video</p>
                </a>
              </li>

              @if (Auth()->user()->roles->first()->name == "super_admin")



                <li class="nav-item">
                    <a href="{{route('video.trashed')}}" class="nav-link {{ Request::is('admin/video/trashed') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Video Soft Deleted</p>
                    </a>
                </li>

              @else
                <li class="nav-item">
                    <a href="" class="nav-link disabled">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Video Soft Deleted</p>
                    </a>
                </li>
              @endif


            </ul>
          </li>





          <li class="nav-item has-treeview {{ Request::is('admin/comment/comments') ? 'menu-open' : ''}} {{ Request::is('admin/comment/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/comment/comments') ? 'active' : ''}} {{ Request::is('admin/comment/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Comments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('comment.index')}}" class="nav-link {{ Request::is('admin/comment/comments') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>Comments</p>
                </a>
              </li>


              @if (Auth()->user()->roles->first()->name == "super_admin")


                <li class="nav-item">
                    <a href="{{route('comment.trashed')}}" class="nav-link {{ Request::is('admin/comment/trashed') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Comment Soft Deleted</p>
                    </a>
                </li>

              @else
                <li class="nav-item">
                    <a href="" class="nav-link disabled">
                    <i class="nav-icon fas fa-fw fa-folder fas fa-trash"></i>
                    <p>Comment Soft Deleted</p>
                    </a>
                </li>
              @endif


            </ul>
          </li>


          <li class="nav-item has-treeview {{ Request::is('admin/message/messages') ? 'menu-open' : ''}} {{ Request::is('admin/message/trashed') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ Request::is('admin/message/messages') ? 'active' : ''}} {{ Request::is('admin/message/trashed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-fw fa-folder"></i>
              <p>
                Messages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('message.index')}}" class="nav-link {{ Request::is('admin/message/messages') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-fw fa-folder"></i>
                  <p>Messages</p>
                </a>
              </li>

            </ul>
          </li>










           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setting.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Settings</p>
                </a>
              </li>

            </ul>
          </li>








        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
