@include('layouts.admin.header') 
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

		@include('layouts.admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts.admin.nav') 
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> User List</h4>-->

              <!-- Basic Bootstrap Table -->
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Password</h5>
                    </div>
				 <form class="form-horizontal" method="post" id="user" enctype="multipart/form-data" action="{{ Url('admin/updatepassword') }}">{{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Current Password</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="password" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Name"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ auth::user()->password }}"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">New Password</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-password"></i></span>
                            <input type="text" name="new_password " class="form-control" id="basic-icon-default-fullname" placeholder="Enter the New Password "aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ auth::user()->new_password }}"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">New Confirm Password</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-password"></i></span>
                            <input type="text" name="new_confirm_password" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Confirm Password"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ auth::user()->new_confirm_password }}"/>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
						 <a href="{{ url('') }}" class="btn btn-warning">Cancel</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
           
 

              <hr class="my-5" />

              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
@include('layouts.admin.footer')

 <script>
     $('#cities').validate({ // initialize the plugin
        ignore: ".ignore",
        rules: {
            city_name: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages:{
 
            city_name:{
                required:"City name is required"
            },

            status:{
                required:"Status is required"
            }

        }
    });
 </script>