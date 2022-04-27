@extends('layouts.front.default')
@section('content')
<!-- Document Wrapper  
  
  	<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>My Profile</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.html">Home</a></li>
              <li class="active">My Profile</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- Page Header end -->
    
  <!-- Content
  ============================================= -->
  <div id="content">
    <div class="container">
      <div class="bg-light shadow-md rounded p-4">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
              <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="firstTab" aria-selected="true">Personal Information</a> </li>
              <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="secondTab" aria-selected="false">Change Password</a> </li>
              <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#thirdTab" role="tab" aria-controls="thirdTab" aria-selected="false">Favourites</a> </li>
              <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourthTab" role="tab" aria-controls="fourthTab" aria-selected="false">Cards</a> </li>
              <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fivthTab" role="tab" aria-controls="fivthTab" aria-selected="false">KYC</a> </li>
			   <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#sixthTab" role="tab" aria-controls="fivthTab" aria-selected="false">Wallet Balance</a> </li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content my-3" id="myTabContentVertical">
              <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
					@if (\Session::has('message'))
						<div class="alert alert-success">
							<ul>
								<li>{!! \Session::get('message') !!}</li>
							</ul>
						</div>
					@endif
                  <div class="col-lg-8">
                    <h4 class="mb-4">Personal Information</h4>
                    <form id="personalInformation" method="post" enctype="multipart/form-data" action="{{ url('/updateprofile') }}">@csrf
                      <div class="mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="male" name="gender" class="custom-control-input" value="male" @if(auth::user()->gender=='male') checked @endif required type="radio">
                          <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="female" name="gender" class="custom-control-input" value="female" @if(auth::user()->gender=='female') checked @endif required type="radio">
                          <label class="custom-control-label" for="female">Female</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" value="{{ auth::user()->name }}" name="name" class="form-control" data-bv-field="fullName" id="fullName" required placeholder="Full Name">
                      </div>
                      <div class="form-group">
                        <label for="mobileNumber">Mobile Number</label>
                        <input type="text" value="{{ auth::user()->mobile }}" name="mobile" class="form-control" data-bv-field="mobilenumber" id="mobileNumber" required placeholder="Mobile Number">
                      </div>
                      <div class="form-group">
                        <label for="emailID">Email ID</label>
                        <input type="text" value="{{ auth::user()->email }}" name="email" class="form-control" data-bv-field="emailid" id="emailID" required placeholder="Email ID">
                      </div>
                      <div class="form-group">
                        <label for="birthDate">Date of Birth</label>
                        <input id="birthDate" value="{{ auth::user()->dob }}" name="dob" type="text" class="form-control" required placeholder="Date of Birth">
                      </div>
                      <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input id="birthDate" value="{{ auth::user()->profile_image }}" name="profile_image" type="file" class="form-control" required placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="dreamone">Dreamone ID</label>
                        <input id="birthDate" value="{{ auth::user()->dream_id }}" name="dream_id" type="text" class="form-control" required placeholder="Dream id">
                      </div>
                      <div class="form-group">
                        <label for="inputCountry">Country</label>
                        <select class="custom-select" id="inputCountry" name="country_id">
                          <option value=""> --- Please Select --- </option>
							@foreach($country as $countryval)
								<option value="{{ $countryval->nicename }}" @if($countryval->nicename==auth::user()->country) {{ "selected" }} @endif>{{ $countryval->nicename }} </option>
							@endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        <input id="birthDate" value="{{ auth::user()->state }}" name="state" type="text" class="form-control" required placeholder="State">
                      </div>
                      <div class="form-group">
                        <label for="city">City</label>
                        <input id="birthDate" value="{{ auth::user()->city }}" name="city" type="text" class="form-control" required placeholder="city">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input id="birthDate" value="{{ auth::user()->address }}" name="address" type="text" class="form-control" required placeholder="Address">
                      </div>
                      <button class="btn btn-primary" type="submit">Update Now</button>
                    </form>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0 ">
                    <div class="card bg-light-3 p-3">
                      <p class="mb-2">We value your Privacy.</p>
                      <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                      <hr>
                      <p class="mb-2">Billing Enquiries</p>
                      <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="secondTab" role="tabpanel" aria-labelledby="second-tab">
                <div class="row">
					@if(count($errors)>0)
						<ul>
							@foreach($errors->all() as $error)
							<li class="alert alert-success">{{$error}}</li>
							@endforeach
						</ul>
					@endif
                  <div class="col-lg-8">
                    <h4 class="mb-4">Change Password</h4>
                    <form id="changePassword" method="post" action="{{ url('updatepassword') }}">@csrf
                      <div class="form-group">
                        <input type="text" class="form-control" name="current_password" data-bv-field="current_password" id="current_password" required placeholder="Existing Password">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="new_password" data-bv-field="new_password" id="new_password" required placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="new_confirm_password" data-bv-field="new_confirm_password" id="new_confirm_password" required placeholder="Confirm Password">
                      </div>
                      <button class="btn btn-primary" type="submit">Update Password</button>
                    </form>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0 ">
                    <div class="card bg-light-3 p-3">
                      <p class="mb-2">We value your Privacy.</p>
                      <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                      <hr>
                      <p class="mb-2">Billing Enquiries</p>
                      <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
					   <hr>
					   @if($aadhar)
						<p class="mb-2">Aadhar Documents</p>
					    <p class="text-1 mb-0"><a href="{{ asset('storage/aadhar/'.$aadhar->aadharfront) }}">Aadhar Front</a>.</p>
						@endif
					</div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="third-tab">
                <h4 class="mb-4">Your Saved Connections</h4>
                <div class="table-responsive-lg">
                  <table class="table table-hover border">
                    <tbody>
                      <tr>
                        <td class="text-center align-middle"><img class="border p-1 rounded bg-light" src="images/brands/operator/vodafone.jpg" alt=""></td>
                        <td class="text-center align-middle">9898989898</td>
                        <td class="text-center align-middle">Vodafone</td>
                        <td class="align-middle">
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button>
                          <button class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button></div></td>
                      </tr>
                      <tr>
                        <td class="text-center align-middle"><img class="border p-1 rounded bg-light" alt="" src="images/brands/operator/vodafone.jpg"></td>
                        <td class="text-center align-middle">9696969696</td>
                        <td class="text-center align-middle">Vodafone</td>
                        <td class="align-middle">
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button>
                          <button class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button></div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="fourthTab" role="tabpanel" aria-labelledby="fourth-tab">
                <div class="row">
                  <div class="col-lg-5">
                    <h4 class="mb-4">Your Saved Cards</h4>
                    <div id="savedCard" class="bg-light-4 rounded p-3 mb-4 mb-lg-0">
                      <h4 class="mb-3">XXXX-XXXX-XXXX-7248</h4>
                      <p>Expiry Date<br>
                        <small>07/2029</small></p>
                      <p class="d-flex m-0"> 
                      <a class="mr-2" href="#"><i class="fas fa-edit"></i> Edit</a> 
                      <a href="#"><i class="fas fa-minus-circle"></i> Remove</a>
                      <img class="ml-auto" src="images/payment/visa.png" alt="visa" title="">
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <h4>Add New Credit/Debit Card</h4>
                    <p>For experience a faster checkout experience</p>
                    <form id="payment" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="cardnumber" id="cardNumber" required placeholder="Card Number">
                      </div>
                      <div class="form-row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <select class="custom-select" required="">
                              <option value="">Expiry Month</option>
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <select class="custom-select" required="">
                              <option value="">Expiry Year</option>
                              <option>2018</option>
                              <option>2019</option>
                              <option>2020</option>
                              <option>2021</option>
                              <option>2022</option>
                              <option>2023</option>
                              <option>2024</option>
                              <option>2025</option>
                              <option>2026</option>
                              <option>2027</option>
                              <option>2028</option>
                              <option>2029</option>
                              <option>2030</option>
                              <option>2031</option>
                              <option>2032</option>
                              <option>2033</option>
                              <option>2034</option>
                              <option>2035</option>
                              <option>2036</option>
                              <option>2037</option>
                              <option>2038</option>
                              <option>2039</option>
                              <option>2040</option>
                              <option>2041</option>
                              <option>2042</option>
                              <option>2043</option>
                              <option>2044</option>
                              <option>2045</option>
                              <option>2046</option>
                              <option>2047</option>
                              <option>2048</option>
                              <option>2049</option>
                              <option>2050</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control" data-bv-field="cvvnumber" id="cvvNumber" required placeholder="CVV Number">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="cardholdername" id="cardHolderName" required placeholder="Card Holder Name">
                      </div>
                      <button class="btn btn-primary" type="submit">Add Card</button>
                    </form>
                  </div>
                </div>
              </div>
              
               <div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="third-tab">
                <h4 class="mb-4">Your Saved Connections</h4>
                <div class="table-responsive-lg">
                  <table class="table table-hover border">
                    <tbody>
                      <tr>
                        <td class="text-center align-middle"><img class="border p-1 rounded bg-light" src="images/brands/operator/vodafone.jpg" alt=""></td>
                        <td class="text-center align-middle">9898989898</td>
                        <td class="text-center align-middle">Vodafone</td>
                        <td class="align-middle">
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button>
                          <button class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button></div></td>
                      </tr>
                      <tr>
                        <td class="text-center align-middle"><img class="border p-1 rounded bg-light" alt="" src="images/brands/operator/vodafone.jpg"></td>
                        <td class="text-center align-middle">9696969696</td>
                        <td class="text-center align-middle">Vodafone</td>
                        <td class="align-middle">
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button>
                          <button class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button></div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
               <div class="tab-pane fade" id="fivthTab" role="tabpanel" aria-labelledby="fivth-tab">
                <div class="formPage-each">
               <div class="formPage-stuff" data-pagenumber-id="1" style="width: 100%; max-width: 752px; display: none;"></div>
   
                <div class="row">
					@if (\Session::has('message'))
						<div class="alert alert-success">
							<ul>
								<li>{!! \Session::get('message') !!}</li>
							</ul>
						</div>
					@endif
                  <div class="col-lg-8">
                    <h4 class="mb-4">KYC Information</h4>
                    <form id="personalInformation" id="kyc" method="post" action="{{ url('/update-kyc') }}" enctype='multipart/form-data'>@csrf
                      <div class="form-group">
                        <label for="fullName">Aadhar card front image</label>
                        <input type="file" value="" name="aadharfront" class="form-control" data-bv-field="aadharfront" id="aadharfront" required placeholder="Full Name">
                      </div>
                      <div class="form-group">
                        <label for="fullName">Aadhar card back image</label>
                        <input type="file" value="" name="aadharback" class="form-control" data-bv-field="aadharback" id="aadharback" required placeholder="Full Name">
                      </div>
                      <div class="form-group">
                        <label for="aadharnumber">Aadhar card number</label>
                        <input type="text" value="<?php if(isset($aadhar->aadharnumber)){ echo $aadhar->aadharnumber; } ?>" name="aadharnumber" class="form-control" data-bv-field="aadharnumber" id="aadharnumber" required placeholder="Aadhar number">
                      </div>
                      <div class="form-group">
                        <label for="pan">Pan card front image</label>
                        <input type="file" value="" name="panfront" class="form-control" data-bv-field="panfront" id="panfront" required >
                      </div>
                      <div class="form-group">
                        <label for="pan">Pan card back image</label>
                        <input type="file" value="" name="panback" class="form-control" data-bv-field="panback" id="panback" required >
                      </div>
                      <div class="form-group">
                        <label for="pannumber">Pan number</label>
                        <input id="pannumber" value="<?php if(isset($aadhar->aadharnumber)){ echo $aadhar->pannumber; } ?>" name="pannumber" type="text" class="form-control" required placeholder="Pan Number">
                      </div>
                      <button class="btn btn-primary" type="submit">Update Now</button>
                    </form>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0 ">
                    <div class="card bg-light-3 p-3">
                      <p class="mb-2">We value your Privacy.</p>
                      <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                      <hr>
                      <p class="mb-2">Billing Enquiries</p>
                      <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
					   <hr>
					   @if($aadhar)
						<p class="mb-2">Aadhar Documents</p>
					    <p class="text-1 mb-0"><a href="{{ asset('storage/aadhar/'.$aadhar->aadharfront) }}" target="_blank">Aadhar Front</a>.</p>
						<p class="text-1 mb-0"><a href="{{ asset('storage/aadhar/'.$aadhar->aadharback) }}" target="_blank">Aadhar Back</a>.</p>

						<p class="mb-2">Pan Documents</p>
					    <p class="text-1 mb-0"><a href="{{ asset('storage/pan/'.$aadhar->panfront) }}" target="_blank">Pan Front</a>.</p>
						<p class="text-1 mb-0"><a href="{{ asset('storage/pan/'.$aadhar->panback) }}" target="_blank">Pan Back</a>.</p>
						@endif
					</div>
                  </div>
                </div>  
              </div>
			<style>
			</style>
              </div>
               <div class="tab-pane fade" id="sixthTab" role="tabpanel" aria-labelledby="third-tab">
                <h4 class="mb-4">Wallet Balance</h4>
                <div class="table-responsive-lg">
                  <table class="table table-hover border">
                    <tbody>
                      <tr>
                         <td class="text-center align-middle">Amount: {{ auth::user()->amount }}</td>
                       </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
  
  @endsection
  
 