<nav class="navbar navbar-default navbar-expand-lg fixed-top">
     <div class="container">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
         </button>
         <a class="navbar-brand" href="{{ route('home') }}"><img width="200px;" class="img-fluid" src="{{ asset('images/slideshow/logo.png') }}" alt="Logo"></a>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="nav navbar-nav">

                <li class="{{ (request()->segment(1) == 'home') ? 'active' : '' }}">  
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="{{ (request()->segment(1) == 'vacancy') ? 'active' : '' }}">  
                    <a href="{{ route('vacancy.index') }}"><i class="fa fa-briefcase"></i> Job list</a>
                </li>
                <li class="{{ (request()->segment(1) == 'pricing') ? 'active' : '' }}">  
                    <a href="{{ route('view-payment') }}"><i class="fa fa-dollar"></i> Pricing</a>
                </li>
                <li class="{{ (request()->segment(1) == 'post-page') ? 'active' : '' }}"> 
                    <a href="{{ route('post_page') }}"><i class="fa fa-newspaper-o"></i> Media</a>
                </li>
                <li class="{{ (request()->segment(1) == 'contact-us') ? 'active' : '' }}"> 
                    <a href="{{ route('contact.index') }}"><i class="fa fa-envelope-o"></i> Contact US</a>
                </li>
             </ul>
         </div>
         @if(Auth::Check())
            <div class="navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-user"></i> {{ auth()->user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('dashbaord') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                        </ul>
                         <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                    </li>
                </ul>
            </div>
        @else
              <ul class="sign-in">
             <li><i class="fa fa-user"></i></li>
             <li><a href="{{ route('login')}} ">Sign In</a></li>
             <li><a href="{{ route('register')}} ">Register</a></li>
         </ul>
         <a href="{{ route('login') }}" class="btn"> Post Your Job</a>
         @endif
     </div>
     </div>
 </nav>
