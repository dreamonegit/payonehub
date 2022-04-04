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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Coupon/</span>Add coupon</h4>

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
						<div class="col-6">
                          <label class="col-sm-6 col-form-label" for="basic-default-name">Coupon code method</label>
                          <div class="col-sm-10">
							<div class="form-check mt-3">
							<input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
							<label class="form-check-label" for="defaultRadio1"> Automatic </label>
							</div>
							<div class="form-check">
							<input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio2" checked="">
							<label class="form-check-label" for="defaultRadio2"> Manual </label>
							</div>	
                          </div>
                        </div>
						<div class="col-6">
                          <label class="col-sm-12 col-form-label" for="basic-default-name">Coupon code type</label>
                          <div class="col-sm-10">
							<div class="form-check mt-3">
							<input name="default-radio-1" class="form-check-input" type="radio" value="" id="cctype">
							<label class="form-check-label" for="cctype"> Single Time </label>
							</div>
							<div class="form-check">
							<input name="default-radio-1" class="form-check-input" type="radio" value="" id="cctype1" checked="">
							<label class="form-check-label" for="cctype1"> Multiple Time </label>
							</div>	
                          </div>
                        </div>
						</div>
                        <div class="row mb-3">
							<div class="col-6">
							  <label class="col-sm-12 col-form-label" for="basic-default-name">Discount type</label>
							  <div class="col-sm-10">
								<div class="form-check mt-3">
								<input name="default-radio-1" class="form-check-input" type="radio" value="" id="cctype">
								<label class="form-check-label" for="cctype"> %</label>
								</div>
								<div class="form-check">
								<input name="default-radio-1" class="form-check-input" type="radio" value="" id="cctype1" checked="">
								<label class="form-check-label" for="cctype1"> Rs </label>
								</div>	
							  </div>
							</div>
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Amount</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
                        </div>
                        <div class="row mb-3">
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
                        </div>
                        <div class="row mb-3">
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
                        </div>
                        <div class="row mb-3">
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
							<div class="col-6">
							  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
								  <div class="col-sm-10">
									<input
									  name="company"
									  type="text"
									  class="form-control"
									  id="company"
									  placeholder="ACME Inc."
									  value=""
									/>
								  </div>
							  </div>
                        </div>						
                        <div class="row mb-3">
							<div class="col-6">
							<label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
								<div class="col-md-10">
								  <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
								</div>						
							</div>
						<div class="col-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                          <div class="col-sm-10">
							<select name="status" id="status" class="form-select">
							  <option>---Default select---</option>
								<option value="0">Active</option>
								<option value="1">In-Active</option>
							</select>
                          </div></div>
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