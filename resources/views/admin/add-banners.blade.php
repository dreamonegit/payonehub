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
                      <h5 class="mb-0">Add Banners</h5>
                    </div>
				 <form class="form-horizontal" method="post" name="banners" id="banners" enctype="multipart/form-data" action="{{ url('admin/save-banners') }}">{{ csrf_field() }}
					@if(isset($banners))
					<input type="hidden" name="id" value="{{$banners->id}}">
					@else
					<input type="hidden" name="id" value="0">
					@endif
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Title</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class=""></i></span>
                            <input type="text" name="title" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Title"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="@if(isset($banners->title)) {{ $banners->title }} @endif"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class=""></i></span>
                            <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Ente the Name"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="@if(isset($banners->name)) {{ $banners->name }} @endif"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Upload Image</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-image"></i></span>
                            <input type="file"  name="image" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                          </div>
                        </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Short Text</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                            <textarea name="short_text" id="basic-icon-default-message" class="form-control" placeholder="Enter the Short Text" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">@if(isset($banners)) {{ $banners->short_text }} @endif</textarea>
                          </div>
                        </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Description</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                            <textarea name="description" id="basic-icon-default-message" class="form-control" placeholder="Enter the Message" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">@if(isset($banners)) {{ $banners->description }} @endif</textarea>
                          </div>
                        </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" aria-label="Default select example">
                          <option selected>---choose the status---</option>
                          <option value="0" @if(isset($banners))@if($banners->status==0) {{ "selected" }} @endif @endif>Active</option>
                          <option value="1" @if(isset($banners))@if($banners->status==1) {{ "selected" }} @endif @endif>In-Active</option>
                        </select>
                      </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
						 <a href="{{ url('list-banners') }}" class="btn btn-warning">Cancel</a>
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
     $('#banners').validate({ // initialize the plugin
        ignore: ".ignore",
        rules: {
            title: {
                required: true
            },
            name: {
                required: true
            },
            short_text: {
                required: true
            },
            description: {
                required: true
            }

        },
        messages:{
 
            title:{
                required:"Title is required"
            },
            name:{
                required:"Name is required"
            },
            short_text:{
                required:"City is required"
            },
            description:{
                required:"Description is required"
            }
         }
    });
 </script>