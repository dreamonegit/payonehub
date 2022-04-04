@include('layouts.admin.header') 
<?php use App\Role; ?>
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
			  <div class="card-header">
                <h5 class="">Client List</h5>
				<a href="{{ url('/admin/addclient') }}" class="btn btn-primary" style="float: right;">ADD CLIENT</a>
				</div>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Client Name</th>
						<th>Image</th>
                        <th>E-mail</th>
                        <th>Mobile</th>
						<th>Role</th>
						<th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
					@php $i = 1 @endphp
					@if(!$clientlist->isEmpty())
						@foreach($clientlist as $clientlistval)
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $clientlistval->name }}</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src="{{ asset('/storage/profile/'.$clientlistval->profile_image) }}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
						
						<td>{{ $clientlistval->email }}</td>
						<td>{{ $clientlistval->mobile }}</td>
						<td><button type="button" class="btn btn-sm btn-info">{{ ucwords(strtolower(Role::getrolename($clientlistval->role))) }}</button></td>
                        <td><span class="badge bg-label-primary me-1">@if($clientlistval->status==0) Active @else In-Active @endif </span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ url('admin/editclient/'.$clientlistval->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{ url('admin/deleteclient/'.$clientlistval->id) }}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
					  @php $i++ @endphp
                      @endforeach
					@endif
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