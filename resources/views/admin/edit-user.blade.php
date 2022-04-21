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
                      <h5 class="mb-0">Edit List User</h5>
                    </div>
				 <form class="form-horizontal" method="post" id="user" enctype="multipart/form-data" action="{{ Url('admin/save-user') }}">{{ csrf_field() }}
					@if(isset($users))
					<input type="hidden" name="id" value="{{$users->id}}">
					@else
					<input type="hidden" name="id" value="0">
					@endif
                    <div class="card-body">
                     <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Dreamone ID</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="dream_id" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Dreamone Id"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"value="@if(isset($users->dream_id)) {{ $users->dream_id }} @endif"/>
                          </div>
                        </div>
                     <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Name"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"value="@if(isset($users->name)) {{ $users->name }} @endif"/>
                          </div>
                        </div>
                     <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Email</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="email" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Email"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"value="@if(isset($users->email)) {{ $users->email }} @endif"/>
                          </div>
                        </div>
                     <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Mobile</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="mobile" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the mobile"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"value="@if(isset($users->mobile)) {{ $users->mobile }} @endif"/>
                          </div>
                        </div>
                     <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Bank Account</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="bank_account" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the AccountNo"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"value="@if(isset($users->bank_account)) {{ $users->bank_account }} @endif"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">INR</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-"></i></span>
                            <input type="text" name="amount" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Amount"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"value="@if(isset($users->amount)) {{ $users->amount }} @endif"/>
                          </div>
                        </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" aria-label="Default select example">
                          <option selected>---choose the status---</option>
                          <option value="0" @if(isset($users))@if($users->status==0) {{ "selected" }} @endif @endif>Active</option>
                          <option value="1" @if(isset($users))@if($users->status==1) {{ "selected" }} @endif @endif>In-Active</option>
                        </select>
                      </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
						 <a href="{{ url('list-user') }}" class="btn btn-warning">Cancel</a>
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
            }

        },
        messages:{
 
            city_name:{
                required:"City name is required"
            }


        }
    });
 </script>