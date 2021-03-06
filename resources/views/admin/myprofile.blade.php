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
                      <h5 class="mb-0">My Profile</h5>
                    </div>
				 <form class="form-horizontal" method="post" id="user" enctype="multipart/form-data" action="{{ Url('admin/updateprofile') }}">{{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Name"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ auth::user()->name }}"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Email</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-mail-send"></i></span>
                            <input type="text" name="email" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Email "aria-label="" aria-describedby="basic-icon-default-fullname2" value="{{ auth::user()->email }}"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Mobile</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-mobile"></i></span>
                            <input type="text" name="mobile" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the mobile"aria-label="" aria-describedby="basic-icon-default-fullname2" value="{{ auth::user()->mobile }}"/>
                          </div>
                        </div>
                         <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Upload Image</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-image"></i></span>
                            <input type="file" name="profile_image" class="form-control" id="basic-icon-default-fullname" placeholder=""aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                          </div>
                        </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" aria-label="Default select example">
                          <option>---choose the status---</option>
                          <option value="0" @if(auth::user()->status==0) {{ "selected" }} @endif>Active</option>
                          <option value="1" @if(auth::user()->status==1) {{ "selected" }} @endif>In-Active</option>
                        </select>
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
