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
                      <h5 class="mb-0">Add categorys</h5>
                    </div>
				 <form class="form-horizontal" method="post" id="categorys" enctype="multipart/form-data" action="{{ Url('admin/save-categorys') }}">{{ csrf_field() }}
					@if(isset($categorys))
					<input type="hidden" name="id" value="{{$categorys->id}}">
					@else
					<input type="hidden" name="id" value="0">
					@endif
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Main Category Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class=""></i></span>
                            <input type="text" name="catname" class="form-control" id="catname" placeholder="Enter the Category Name"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="@if(isset($categorys->catname)) {{ $categorys->catname }} @endif"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Upload Image</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-image"></i></span>
                            <input type="file" name="image" class="form-control" id="basic-icon-default-fullname" placeholder=""aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Meta Title</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class=""></i></span>
                            <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter the Title"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="@if(isset($categorys->meta_title)) {{ $categorys->meta_title }} @endif" />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Meta Keyword</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class=""></i></span>
                            <input type="text" name="meta_keyword" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the Keyword"aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="@if(isset($categorys->meta_keyword)) {{ $categorys->meta_keyword }} @endif"/>
                          </div>
                        </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Description</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                            <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Enter the Message" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">@if(isset($categorys)) {{ $categorys->meta_description }} @endif</textarea>
                          </div>
                        </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" aria-label="Default select example">
                          <option selected>---choose the status---</option>
                          <option value="0" @if(isset($categorys))@if($categorys->status==0) {{ "selected" }} @endif @endif>Active</option>
                          <option value="1" @if(isset($categorys))@if($categorys->status==1) {{ "selected" }} @endif @endif>In-Active</option>
                        </select>
                      </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
						 <a href="{{ url('list-categorys') }}" class="btn btn-warning">Cancel</a>
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
     $('#categorys').validate({ // initialize the plugin
        ignore: ".ignore",
        rules: {
            catname: {
                required: true
            },
            description: {
                required: true
            },
            meta_title: {
                required: true
            },
            meta_keyword: {
                required: true
            },
            meta_description: {
                required: true
            }
        },
        messages:{
 
            catname:{
                required:"Name is required"
            },
            description:{
                required:"Description is required"
            },
            meta_title:{
                required:"Meta Title is required"
            },
            meta_keyword:{
                required:"Meta Keyword is required"
            },
            meta_description:{
                required:"Meta Description is required"
            }

        }
    });
 </script>