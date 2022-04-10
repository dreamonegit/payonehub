        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
               
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2"> <img src="{{ asset('assets/front/images/logo.png') }}" style="width: 211px"></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item @if(Request::segment(2) == '') {{ 'active' }} @endif">
              <a href="{{ url('/admin') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
			<li class="menu-item">
			  <a href="{{ url('/admin/list-categorys') }}" class="menu-link">
			  <span class="iconify" data-icon="bx:category"></span>
			  <i class="menu-icon tf-icons bx bx-category"></i>
				<div data-i18n="Connections">Categorys</div>
			  </a>
			</li>
			<li class="menu-item">
			  <a href="{{ url('/admin/list-subcategorys') }}" class="menu-link">
			  <i class="menu-icon tf-icons bx bx-category-alt"></i>
				<div data-i18n="Connections">Subategorys</div>
			  </a>
			</li>
            <!-- Layouts -->
            <li class="menu-item @if(Request::segment(2) == 'clientlist') {{ 'active' }} @endif">
              <a href="{{ url('/admin/clientlist') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Account">Client List</div>
              </a>
            </li>
            <li class="menu-item @if(Request::segment(2) == 'user') {{ 'active' }} @endif">
              <a href="{{ url('/admin/user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Account">User</div>
              </a>
            </li>
            <li class="menu-item @if(Request::segment(2) == 'coupon') {{ 'active' }} @endif">
              <a href="{{ url('/admin/coupon') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Account">Coupon code</div>
              </a>
            </li>
                <li class="menu-item">
                  <a href="{{ url('/admin/list-cities') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bxs-city"></i>
                    <div data-i18n="Connections">City</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('/admin/list-banners') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bxs-image"></i>
                    <div data-i18n="Connections">Banners</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('/admin/list-cms') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Connections">Cms</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('/admin/list-testimonials') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bx-layer"></i>
                    <div data-i18n="Connections">Testimonial</div>
				</a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('/admin/list-faqs') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bx-message-alt-detail"></i>
                    <div data-i18n="Connections">FAQ</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('/admin/list-contactus') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bx-phone"></i>
                    <div data-i18n="Connections">Contactus</div>
                  </a>
                </li>
				 <li class="menu-item">
                  <a href="{{ url('/admin/list-kycinformations') }}" class="menu-link">
				  <i class="menu-icon tf-icons bx bx-id-card"></i>
                    <div data-i18n="Connections">KYC</div>
                  </a>
                </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="Account">Account</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-notifications.html" class="menu-link">
                    <div data-i18n="Notifications">Notifications</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-connections.html" class="menu-link">
                    <div data-i18n="Connections">Connections</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>