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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client/</span>Add client</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
				@if (\Session::has('message'))
					<div class="alert alert-danger">
						<ul>
							<li>{!! \Session::get('message') !!}</li>
						</ul>
					</div>
				@endif
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">{{ $title }}</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{ url('/admin/addclient') }}" id="addclient" enctype='multipart/form-data'>@csrf
						  @if(isset($client))
							   <input type="hidden" name="id" value="{{ $client->id }}"/>
						  @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" value="@if(isset($client)) {{ $client->name }} @endif"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                          <div class="col-sm-10">
                            <input
							  name="company"
                              type="text"
                              class="form-control"
                              id="company"
                              placeholder="ACME Inc."
							  value="@if(isset($client)) {{ $client->company }} @endif"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
							    name="email"
                                type="text"
                                id="basic-default-email"
                                class="form-control"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                aria-describedby="basic-default-email2"
								value="@if(isset($client)) {{ $client->email }} @endif"
                              />
                              <span class="input-group-text" id="basic-default-email2">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                          <div class="col-sm-10">
                            <input
							  name="mobile"
                              type="text"
                              id="mobile"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              aria-label="658 799 8941"
                              aria-describedby="basic-default-phone"
							  value="@if(isset($client)) {{ $client->mobile }} @endif"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                          <div class="col-sm-10">
                            <textarea
							  name="message"
                              id="basic-default-message"
                              class="form-control"
                              placeholder="Hi, Do you have a moment to talk Joe?"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                            >@if(isset($client)) {{ $client->message }} @endif</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Profile Image</label>
                          <div class="col-sm-10">
								<input class="form-control" type="file" id="formFile" name="profile_image">
                          </div>
                        </div>	
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Role</label>
                          <div class="col-sm-10">
							<select name="role" id="role" class="form-select" name="role">
							  <option>---Default select---</option>
							  @foreach($role as $roleval)
								<option value="{{ $roleval->role }}" @if(isset($client)) @if($client->role==$roleval->role) {{ "selected" }} @endif @endif>{{ $roleval->rolename }}</option>
							  @endforeach
							</select>
                          </div>
                        </div>					
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                          <div class="col-sm-10">
							<select name="status" id="status" class="form-select">
							  <option>---Default select---</option>
								<option value="0" @if(isset($client)) @if($client->status==0) {{ "selected" }} @endif @endif>Active</option>
								<option value="1" @if(isset($client)) @if($client->status==1) {{ "selected" }} @endif @endif>In-Active</option>
							</select>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
		@include('layouts.admin.footer')