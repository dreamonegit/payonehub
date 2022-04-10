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
              <div class="card">
                <h5 class="card-header">List Contactus</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
						<th>Mobile</th>
						<th>Message</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
					  @foreach ( $contactus as $contactusval )
                      <tr>
                        <td>{{ $contactusval->id }}</td>
                        <td>{{ $contactusval->name }}</td>
					    <td>{{ $contactusval->email }}</td>
						 <td>{{ $contactusval->mobile }}</td>
                        <td>{{ $contactusval->message }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                             
                              <a class="dropdown-item" href="{{ url('admin/delete-contactus/'.$contactusval->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
 

              <hr class="my-5" />

              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
		@include('layouts.admin.footer')