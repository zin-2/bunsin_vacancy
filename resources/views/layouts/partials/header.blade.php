<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>

            </div>

        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="fi fi-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{
                Config::get('languages')[App::getLocale()]['display'] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span
                        class="fi fi-{{ $language['flag-icon'] }}"></span> {{$language['display']}}</a>
                @endif
                @endforeach
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="https://jobpilot.templatecookie.com/admin/profile" class="nav-link dropdown-toggle"
                data-toggle="dropdown" aria-expanded="true">
                <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg"
                    class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded border-0"
                style="left: inherit; right: 0px;">

                <li class="user-header bg-primary rounded-top">
                    <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg"
                        class="user-image img-circle elevation-2" alt="User Image">
                    <p>
                        Admin -
                        (<span>Superadmin</span>)
                        <small>Member Since Dec 28, 2022</small>
                    </p>
                </li>

                <li class="user-footer border-bottom d-flex">
                    <a href="https://jobpilot.templatecookie.com/admin/profile" class="btn btn-default"><i class="nav-icon fas fa-user"></i> Profile</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                        class="btn btn-default ml-auto"> <i class="nav-icon fas fa-sign-out-alt"></i> Log Out</a>
                    <form id="logout-form" action="https://jobpilot.templatecookie.com/admin/logout" method="POST"
                        class="d-none invisible">
                        <input type="hidden" name="_token" value="5thpJ20190zJVpFKkWxVQdzOMt67sDmoSM6AjR3c">
                    </form>
                </li>
            </ul>
        </li>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </ul>
</nav>