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
                <h5 class="card-header">List Subcategorys</h5>
                <div class="table-responsive text-nowrap">
				 <a href="{{ url('admin/add-subcategorys') }}" class="btn btn-primary">Add Subcategorys</a>
                  <table class="table" id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
						<th>Category Name</th>
                        <th>Subcategory Name</th>
                        <th>Image</th>
						<th>Title</th>
						<th>Keyword</th>
                        <th>Description</th>
                        <th>Status</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
					  @foreach ( $subcategorys as $subcategorysval )
                      <tr>
					   <td>{{ $subcategorysval->id }}</td>
					 <td>
						@if(isset($subcategorysval->getcategorys->catname))
						{{ $subcategorysval->getcategorys->catname }}
						@endif
						</td>
                        <td>{{ $subcategorysval->subcat_name }}</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up"  title="Lilian Fuller">
                              <img src="{{ asset('storage/sub/'.$subcategorysval->image) }}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
						 <td>{{ $subcategorysval->meta_title }}</td>
						 <td>{{ $subcategorysval->meta_keyword }}</td>
						<td> {{ substr_replace($subcategorysval->meta_description, "... Read more", 20) }}</td>
						<td>
							@if($subcategorysval->status == '0')
							<span class="badge bg-label-primary me-1">Active</span>
							@elseif($subcategorysval->status == '1')
							<span class="badge bg-label-secondary me-1-">in-Active</span>
							@endif
						</td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ url('admin/edit-subcategorys/'.$subcategorysval->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="{{ url('admin/delete-subcategorys/'.$subcategorysval->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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