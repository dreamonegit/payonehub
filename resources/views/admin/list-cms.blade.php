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
                <h5 class="card-header">List CMS</h5>
                <div class="table-responsive text-nowrap">
				 <a href="{{ url('admin/add-cms') }}" class="btn btn-primary">Add CMS</a>
                  <table class="table" id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
						<th>description</th>
						<th>Meta Title</th>
						<th>Meta Keyword</th>
                        <th>Meta Description</th>
                        <th>Status</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
					  @foreach ( $cms as $cmsval )
                      <tr>
                        <td>{{ $cmsval->id }}</td>
                        <td>{{ $cmsval->title }}</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up"  title="Lilian Fuller">
                              <img src="{{ asset('storage/cms/'.$cmsval->image) }}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
						<td> {{ substr_replace($cmsval->description, "... Read more", 20) }}</td>
						 <td>{{ $cmsval->meta_title }}</td>
						 <td>{{ $cmsval->meta_keyword }}</td>
						<td> {{ substr_replace($cmsval->meta_description, "... Read more", 20) }}</td>
						<td>
							@if($cmsval->status == '0')
							<span class="badge bg-label-primary me-1">Active</span>
							@elseif($cmsval->status == '1')
							<span class="badge bg-label-secondary me-1-">in-Active</span>
							@endif
						</td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ url('admin/edit-cms/'.$cmsval->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="{{ url('admin/delete-cms/'.$cmsval->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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