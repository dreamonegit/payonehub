  <?php use Illuminate\Support\Facades\Auth; ?>
  <!-- Header
  ============================================= -->
  <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-column justify-content-start"> 
          
          <!-- Logo
          ============================================= -->
          <div class="logo"> <a href="{{ url('/') }}" title="PayONEHub"><img src="{{ asset('assets/front/images/logo.png') }}" alt="PayONEHub" width="127" height="29" /></a> </div>
          <!-- Logo end --> 
          
        </div>
        <div class="header-column justify-content-end"> 
          
          <!-- Primary Navigation
          ============================================= -->
          <nav class="primary-menu navbar navbar-expand-lg">
            <div id="header-nav" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="dropdown active"> <a class="dropdown-toggle" href="{{ url('/') }}">Home</a>                  
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" href="#">Recharge & Bill Payment</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Mobile</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Prepaid</a></li>
                        <li><a class="dropdown-item" href="#">Postpaid</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">DTH</a>
                    </li>
                    <li class="dropdown"><a class="#" href="#">Data Card</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Broadband</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Landline</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Cable TV</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Electricity</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Metro</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Gas</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Water</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Recharge Plans</a></li>
                    <li><a class="dropdown-item" href="#">Payment</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-mega"> <a class="dropdown-toggle" href="#">Booking</a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="dropdown-mega-content">
                        <div class="row">
                          <div class="col-lg"> <span class="sub-title">Hotels</Span>
                            <ul class="dropdown-mega-submenu">
                              <li><a class="dropdown-item" href="#">Hotel List</a></li>
                              <li><a class="dropdown-item" href="#">Hotel Grid</a></li>
                              <li><a class="dropdown-item" href="#">Hotel Details</a></li>
                            </ul>
                          </div>
                          <div class="col-lg"> <span class="sub-title">Flights</Span>
                            <ul class="dropdown-mega-submenu">
                              <li><a class="dropdown-item" href="#">One Way Trip List</a></li>
                              <li><a class="dropdown-item" href="#">Round Trip List</a></li>
                              <li><a class="dropdown-item" href="#">Confirm Details</a></li>
                            </ul>
                          </div>
                          <div class="col-lg"> <span class="sub-title">Trains</Span>
                            <ul class="dropdown-mega-submenu">
                              <li><a class="dropdown-item" href="#">Trains List</a></li>
                              <li><a class="dropdown-item" href="#">Confirm Details</a></li>
                            </ul>
                          </div>
                          <div class="col-lg"> <span class="sub-title">Bus</Span>
                            <ul class="dropdown-mega-submenu">
                              <li><a class="dropdown-item" href="#">Bus List</a></li>
                              <li><a class="dropdown-item" href="#">Confirm Details</a></li>
                            </ul>
                          </div>
                          <div class="col-lg"> <span class="sub-title">Other</Span>
                            <ul class="dropdown-mega-submenu">
                              <li><a class="dropdown-item" href="#">Payment</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" href="#">Features</a>
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" href="{{ url('/contactus') }}">Contact Us</a>
                </li>
               @if(!Auth::check())
					<li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0" data-toggle="modal" data-target="#login-signup" href="#" title="Login / Sign up">Login / Sign up <span class="d-none d-lg-inline-block"><i class="fas fa-user"></i></span></a></li>
				@else
					<li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0" href="{{ url('/profile') }}">Welcome  {{ auth::user()->name }}<img src="{{ asset('storage/profileimage/'.auth::user()->profile_image) }}" alt class="w-px-40 h-auto rounded-circle" style="height:70%!important"/></a></li>
					<li class="ml-lg-2"><a class="pl-lg-4 pr-0" href="{{ url('/logout') }}">Logout<span class="d-none d-lg-inline-block"></span></a></li>
				@endif
			  </ul>
            </div>
          </nav>
          <!-- Primary Navigation end --> 
          
        </div>
        
        <!-- Collapse Button
        ============================================= -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
      </div>
    </div>
  </header>
  <!-- Header end --> 