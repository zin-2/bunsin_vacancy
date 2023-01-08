<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('images/slideshow/favicon.ico') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KH-WORKS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <nav class="mt-2">
            
            <ul class="nav nav-pills nav-sidebar flex-column tree" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('dashboard.dashboard')}}
                        </p>
                    </a>
                </li>   
                @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 0 )
                    <li class="nav-item">
                        <a href="{{route('company.index')}}" class="nav-link ">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                {{__('dashboard.company')}}
                            </p>
                        </a>
                    </li>
                @endif
               
                @if(Auth::user()->is_admin == 2 || Auth::user()->is_admin == 1 || Auth::user()->is_admin == 0)
               <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>{{ __('dashboard.manage_candidate') }}<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('employer_applicant')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Canidates</p>
                            </a>
                        </li>   
                    </ul>
                </li>
                @endif
                @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 0 )
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>{{ __('dashboard.manage_jobs') }}<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('job.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List All Vacancy</p>
                            </a>
                        </li>   
                    </ul>
                </li>
                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>CMS<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('post.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>POST</p>
                            </a>
                        </li>   
                    </ul>
                </li>
                <li class="nav-header"> Setting</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Account Setting<i class="right fas fa-angle-left"></i></p>
                    </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('pricing.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pricing</p>
                            </a>
                        </li>   
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cateogry</p>
                            </a>
                        </li>   
                    </ul>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('payment.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Service Package</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
           @endif
                  <li class="nav-item">
                    <a href="{{ route('change_password') }}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                
         
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
