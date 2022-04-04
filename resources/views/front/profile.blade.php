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
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content my-3" id="myTabContentVertical">
              <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
					@if (\Session::has('message'))
						<div class="alert alert-danger">
							<ul>
								<li>{!! \Session::get('message') !!}</li>
							</ul>
						</div>
					@endif
                  <div class="col-lg-8">
                    <h4 class="mb-4">Personal Information</h4>
                    <form id="personalInformation" method="post" action="{{ url('/updateprofile') }}">@csrf
                      <div class="mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="male" name="gender" class="custom-control-input" value="male" @if(auth::user()->gender=='male') "checked" @endif required type="radio">
                          <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="female" name="gender" class="custom-control-input" value="female" @if(auth::user()->gender=='female') "checked" @endif required type="radio">
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
                        <label for="inputCountry">Country</label>
                        <select class="custom-select" id="inputCountry" name="country_id">
                          <option value=""> --- Please Select --- </option>
							@foreach($country as $countryval)
								<option value="{{ $countryval->nicename }}" @if($countryval->nicename==auth::user()->country) {{ "selected" }} @endif>{{ $countryval->nicename }} </option>
							@endforeach
                        </select>
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
							<li class="alert alert-danger">{{$error}}</li>
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
   <div class="formPage-stage form-all  " data-page-id="1" data-page-qid="2" style="max-width: 752px;">
      <ul class="clearfix form-section page-section page_1" style="margin: 0px; font-size: 16px; color: rgb(44, 51, 69); font-family: Inter, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Verdana, sans-serif;">
         <li id="id_1" data-type="control_head" data-qid="1" data-order="1" data-selectioncount="0" class="form-group clearfix isNotSelected form-input-wide form-input-wide-line-fix lineAlignment-Left" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-header-group  header-large">
                     <div class="header-text httal htvam">
                        <h1 id="header_1" class="form-header" data-component="header">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">KYC Form</div>
                           </div>
                        </h1>
                        <div id="subHeader_1" class="form-subHeader">
                           <div class="editor-container editorNoText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_24" data-type="control_autoincrement" data-qid="24" data-order="2" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-None line-Alignment-Top-NDT" style="z-index: 1;">
            <div class="question-wrapper isHidden false">
               <label id="label_24" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Application No.</div>
                  </div>
               </label>
               <div class="form-input" data-layout="full" style="position: relative;"><input type="text" id="hidden_24" class="form-control " data-defaultvalue="0000" tabindex="-1" data-component="autoincrement" value="0000" style="opacity: 0.8; border: 1px dashed rgb(204, 204, 204);"></div>
            </div>
            <div class="hidden-field-warning"><span name="cw_moreinfo" class="ji ji-cw_moreinfo"></span>This field is hidden and will not be seen on the form.</div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_3" data-type="control_head" data-qid="3" data-order="3" data-selectioncount="0" class="form-group clearfix isNotSelected form-input-wide form-input-wide-line-fix lineAlignment-Left" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-header-group  header-default">
                     <div class="header-text httal htvam">
                        <h2 id="header_3" class="form-header" data-component="header">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">A. Identity Details</div>
                           </div>
                        </h2>
                        <div id="subHeader_3" class="form-subHeader">
                           <div class="editor-container editorNoText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_4" data-type="control_fullname" data-qid="4" data-order="4" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_4" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">1. Name of the Applicant</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div data-wrapper-react="true">
                     <span class="form-sub-label-container" data-input-type="first" style="vertical-align: top;">
                        <input type="text" id="first_4" name="q4_1Name4[first]" class="form-control" data-defaultvalue="" autocomplete="section-input_4 given-name" size="10" tabindex="-1" data-component="first" aria-labelledby="label_4 sublabel_4_first" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">First Name</div>
                           </div>
                        </span>
                     </span>
                     <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                        <input type="text" id="last_4" name="q4_1Name4[last]" class="form-control" data-defaultvalue="" autocomplete="section-input_4 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_4 sublabel_4_last" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Last Name</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_5" data-type="control_fullname" data-qid="5" data-order="5" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_5" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">2. Father's/Spouse's Name</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div data-wrapper-react="true">
                     <span class="form-sub-label-container" data-input-type="first" style="vertical-align: top;">
                        <input type="text" id="first_5" name="q5_2Fathersspouses5[first]" class="form-control" data-defaultvalue="" autocomplete="section-input_5 given-name" size="10" tabindex="-1" data-component="first" aria-labelledby="label_5 sublabel_5_first" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">First Name</div>
                           </div>
                        </span>
                     </span>
                     <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                        <input type="text" id="last_5" name="q5_2Fathersspouses5[last]" class="form-control" data-defaultvalue="" autocomplete="section-input_5 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_5 sublabel_5_last" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Last Name</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_6" data-type="control_radio" data-shrinked="true" data-qid="6" data-order="6" data-selectioncount="0" class="form-group clearfix isNotSelected form-group-column lineAlignment-Top form-col-1" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_6" class="form-label form-label-top" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">2a. Gender</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-single-column" role="group" aria-labelledby="label_6" data-component="radio">
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_6" type="radio" tabindex="-1" class="form-radio" id="input_6_0" name="q6_2aGender6" value="Male">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_6_0" style="display: inline-block;">Male</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_6" type="radio" tabindex="-1" class="form-radio" id="input_6_1" name="q6_2aGender6" value="Female">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_6_1" style="display: inline-block;">Female</label></div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_7" data-type="control_radio" data-shrinked="true" data-qid="7" data-order="7" data-selectioncount="0" class="form-group clearfix isNotSelected form-group-column lineAlignment-Top form-col-2" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_7" class="form-label form-label-top" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">2b. Marital Status</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-single-column" role="group" aria-labelledby="label_7" data-component="radio">
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_7" type="radio" tabindex="-1" class="form-radio" id="input_7_0" name="q7_2bMarital7" value="Single">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_7_0" style="display: inline-block;">Single</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_7" type="radio" tabindex="-1" class="form-radio" id="input_7_1" name="q7_2bMarital7" value="Married">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_7_1" style="display: inline-block;">Married</label></div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_8" data-type="control_datetime" data-qid="8" data-order="8" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_8" class="form-label form-label-top" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">2c. Date of Birth</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <div data-wrapper-react="true">
                     <div style="display: none;">
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="month_8" name="q8_2cDate8[month]" type="tel" size="2" data-maxlength="2" data-age="" maxlength="2" autocomplete="section-input_8 off" aria-labelledby="label_8 sublabel_8_month" value=""><span class="date-separate" aria-hidden="true">&nbsp;-</span>
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Month</div>
                              </div>
                           </span>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="day_8" name="q8_2cDate8[day]" type="tel" size="2" data-maxlength="2" data-age="" maxlength="2" autocomplete="section-input_8 off" aria-labelledby="label_8 sublabel_8_day" value=""><span class="date-separate" aria-hidden="true">&nbsp;-</span>
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Day</div>
                              </div>
                           </span>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="year_8" name="q8_2cDate8[year]" type="tel" size="4" data-maxlength="4" data-age="" maxlength="4" autocomplete="section-input_8 off" aria-labelledby="label_8 sublabel_8_year" value=""> 
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Year</div>
                              </div>
                           </span>
                        </span>
                     </div>
                     <span class="form-sub-label-container" style="vertical-align: top;">
                        <input class="form-control validate[limitDate, validateLiteDate]" id="lite_mode_8" type="text" size="12" data-maxlength="12" maxlength="12" data-age="" data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY" disabled="" autocomplete="section-input_8 off" aria-labelledby="label_8 sublabel_8_litemode" value=""><img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_8_pick" src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v2"> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Date</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_9" data-type="control_dropdown" data-qid="9" data-order="9" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_9" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">3. Nationality</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <span class="form-sub-label-container" style="vertical-align: top;">
                     <div>
                        <select readonly="" class="form-dropdown" id="input_9" name="q9_3Nationality9" data-component="dropdown" style="width: 310px;">
                           <option value="">Please Select</option>
                           <option value="United States">United States</option>
                           <option value="Afghanistan">Afghanistan</option>
                           <option value="Albania">Albania</option>
                           <option value="Algeria">Algeria</option>
                           <option value="American Samoa">American Samoa</option>
                           <option value="Andorra">Andorra</option>
                           <option value="Angola">Angola</option>
                           <option value="Anguilla">Anguilla</option>
                           <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                           <option value="Argentina">Argentina</option>
                           <option value="Armenia">Armenia</option>
                           <option value="Aruba">Aruba</option>
                           <option value="Australia">Australia</option>
                           <option value="Austria">Austria</option>
                           <option value="Azerbaijan">Azerbaijan</option>
                           <option value="The Bahamas">The Bahamas</option>
                           <option value="Bahrain">Bahrain</option>
                           <option value="Bangladesh">Bangladesh</option>
                           <option value="Barbados">Barbados</option>
                           <option value="Belarus">Belarus</option>
                           <option value="Belgium">Belgium</option>
                           <option value="Belize">Belize</option>
                           <option value="Benin">Benin</option>
                           <option value="Bermuda">Bermuda</option>
                           <option value="Bhutan">Bhutan</option>
                           <option value="Bolivia">Bolivia</option>
                           <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                           <option value="Botswana">Botswana</option>
                           <option value="Brazil">Brazil</option>
                           <option value="Brunei">Brunei</option>
                           <option value="Bulgaria">Bulgaria</option>
                           <option value="Burkina Faso">Burkina Faso</option>
                           <option value="Burundi">Burundi</option>
                           <option value="Cambodia">Cambodia</option>
                           <option value="Cameroon">Cameroon</option>
                           <option value="Canada">Canada</option>
                           <option value="Cape Verde">Cape Verde</option>
                           <option value="Cayman Islands">Cayman Islands</option>
                           <option value="Central African Republic">Central African Republic</option>
                           <option value="Chad">Chad</option>
                           <option value="Chile">Chile</option>
                           <option value="China">China</option>
                           <option value="Christmas Island">Christmas Island</option>
                           <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                           <option value="Colombia">Colombia</option>
                           <option value="Comoros">Comoros</option>
                           <option value="Congo">Congo</option>
                           <option value="Cook Islands">Cook Islands</option>
                           <option value="Costa Rica">Costa Rica</option>
                           <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                           <option value="Croatia">Croatia</option>
                           <option value="Cuba">Cuba</option>
                           <option value="Curacao">Curacao</option>
                           <option value="Cyprus">Cyprus</option>
                           <option value="Czech Republic">Czech Republic</option>
                           <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                           <option value="Denmark">Denmark</option>
                           <option value="Djibouti">Djibouti</option>
                           <option value="Dominica">Dominica</option>
                           <option value="Dominican Republic">Dominican Republic</option>
                           <option value="Ecuador">Ecuador</option>
                           <option value="Egypt">Egypt</option>
                           <option value="El Salvador">El Salvador</option>
                           <option value="Equatorial Guinea">Equatorial Guinea</option>
                           <option value="Eritrea">Eritrea</option>
                           <option value="Estonia">Estonia</option>
                           <option value="Ethiopia">Ethiopia</option>
                           <option value="Falkland Islands">Falkland Islands</option>
                           <option value="Faroe Islands">Faroe Islands</option>
                           <option value="Fiji">Fiji</option>
                           <option value="Finland">Finland</option>
                           <option value="France">France</option>
                           <option value="French Polynesia">French Polynesia</option>
                           <option value="Gabon">Gabon</option>
                           <option value="The Gambia">The Gambia</option>
                           <option value="Georgia">Georgia</option>
                           <option value="Germany">Germany</option>
                           <option value="Ghana">Ghana</option>
                           <option value="Gibraltar">Gibraltar</option>
                           <option value="Greece">Greece</option>
                           <option value="Greenland">Greenland</option>
                           <option value="Grenada">Grenada</option>
                           <option value="Guadeloupe">Guadeloupe</option>
                           <option value="Guam">Guam</option>
                           <option value="Guatemala">Guatemala</option>
                           <option value="Guernsey">Guernsey</option>
                           <option value="Guinea">Guinea</option>
                           <option value="Guinea-Bissau">Guinea-Bissau</option>
                           <option value="Guyana">Guyana</option>
                           <option value="Haiti">Haiti</option>
                           <option value="Honduras">Honduras</option>
                           <option value="Hong Kong">Hong Kong</option>
                           <option value="Hungary">Hungary</option>
                           <option value="Iceland">Iceland</option>
                           <option value="India">India</option>
                           <option value="Indonesia">Indonesia</option>
                           <option value="Iran">Iran</option>
                           <option value="Iraq">Iraq</option>
                           <option value="Ireland">Ireland</option>
                           <option value="Israel">Israel</option>
                           <option value="Italy">Italy</option>
                           <option value="Jamaica">Jamaica</option>
                           <option value="Japan">Japan</option>
                           <option value="Jersey">Jersey</option>
                           <option value="Jordan">Jordan</option>
                           <option value="Kazakhstan">Kazakhstan</option>
                           <option value="Kenya">Kenya</option>
                           <option value="Kiribati">Kiribati</option>
                           <option value="North Korea">North Korea</option>
                           <option value="South Korea">South Korea</option>
                           <option value="Kosovo">Kosovo</option>
                           <option value="Kuwait">Kuwait</option>
                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                           <option value="Laos">Laos</option>
                           <option value="Latvia">Latvia</option>
                           <option value="Lebanon">Lebanon</option>
                           <option value="Lesotho">Lesotho</option>
                           <option value="Liberia">Liberia</option>
                           <option value="Libya">Libya</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Lithuania">Lithuania</option>
                           <option value="Luxembourg">Luxembourg</option>
                           <option value="Macau">Macau</option>
                           <option value="Macedonia">Macedonia</option>
                           <option value="Madagascar">Madagascar</option>
                           <option value="Malawi">Malawi</option>
                           <option value="Malaysia">Malaysia</option>
                           <option value="Maldives">Maldives</option>
                           <option value="Mali">Mali</option>
                           <option value="Malta">Malta</option>
                           <option value="Marshall Islands">Marshall Islands</option>
                           <option value="Martinique">Martinique</option>
                           <option value="Mauritania">Mauritania</option>
                           <option value="Mauritius">Mauritius</option>
                           <option value="Mayotte">Mayotte</option>
                           <option value="Mexico">Mexico</option>
                           <option value="Micronesia">Micronesia</option>
                           <option value="Moldova">Moldova</option>
                           <option value="Monaco">Monaco</option>
                           <option value="Mongolia">Mongolia</option>
                           <option value="Montenegro">Montenegro</option>
                           <option value="Montserrat">Montserrat</option>
                           <option value="Morocco">Morocco</option>
                           <option value="Mozambique">Mozambique</option>
                           <option value="Myanmar">Myanmar</option>
                           <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                           <option value="Namibia">Namibia</option>
                           <option value="Nauru">Nauru</option>
                           <option value="Nepal">Nepal</option>
                           <option value="Netherlands">Netherlands</option>
                           <option value="Netherlands Antilles">Netherlands Antilles</option>
                           <option value="New Caledonia">New Caledonia</option>
                           <option value="New Zealand">New Zealand</option>
                           <option value="Nicaragua">Nicaragua</option>
                           <option value="Niger">Niger</option>
                           <option value="Nigeria">Nigeria</option>
                           <option value="Niue">Niue</option>
                           <option value="Norfolk Island">Norfolk Island</option>
                           <option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern Cyprus</option>
                           <option value="Northern Mariana">Northern Mariana</option>
                           <option value="Norway">Norway</option>
                           <option value="Oman">Oman</option>
                           <option value="Pakistan">Pakistan</option>
                           <option value="Palau">Palau</option>
                           <option value="Palestine">Palestine</option>
                           <option value="Panama">Panama</option>
                           <option value="Papua New Guinea">Papua New Guinea</option>
                           <option value="Paraguay">Paraguay</option>
                           <option value="Peru">Peru</option>
                           <option value="Philippines">Philippines</option>
                           <option value="Pitcairn Islands">Pitcairn Islands</option>
                           <option value="Poland">Poland</option>
                           <option value="Portugal">Portugal</option>
                           <option value="Puerto Rico">Puerto Rico</option>
                           <option value="Qatar">Qatar</option>
                           <option value="Republic of the Congo">Republic of the Congo</option>
                           <option value="Romania">Romania</option>
                           <option value="Russia">Russia</option>
                           <option value="Rwanda">Rwanda</option>
                           <option value="Saint Barthelemy">Saint Barthelemy</option>
                           <option value="Saint Helena">Saint Helena</option>
                           <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                           <option value="Saint Lucia">Saint Lucia</option>
                           <option value="Saint Martin">Saint Martin</option>
                           <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                           <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                           <option value="Samoa">Samoa</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                           <option value="Saudi Arabia">Saudi Arabia</option>
                           <option value="Senegal">Senegal</option>
                           <option value="Serbia">Serbia</option>
                           <option value="Seychelles">Seychelles</option>
                           <option value="Sierra Leone">Sierra Leone</option>
                           <option value="Singapore">Singapore</option>
                           <option value="Slovakia">Slovakia</option>
                           <option value="Slovenia">Slovenia</option>
                           <option value="Solomon Islands">Solomon Islands</option>
                           <option value="Somalia">Somalia</option>
                           <option value="Somaliland">Somaliland</option>
                           <option value="South Africa">South Africa</option>
                           <option value="South Ossetia">South Ossetia</option>
                           <option value="South Sudan">South Sudan</option>
                           <option value="Spain">Spain</option>
                           <option value="Sri Lanka">Sri Lanka</option>
                           <option value="Sudan">Sudan</option>
                           <option value="Suriname">Suriname</option>
                           <option value="Svalbard">Svalbard</option>
                           <option value="eSwatini">eSwatini</option>
                           <option value="Sweden">Sweden</option>
                           <option value="Switzerland">Switzerland</option>
                           <option value="Syria">Syria</option>
                           <option value="Taiwan">Taiwan</option>
                           <option value="Tajikistan">Tajikistan</option>
                           <option value="Tanzania">Tanzania</option>
                           <option value="Thailand">Thailand</option>
                           <option value="Timor-Leste">Timor-Leste</option>
                           <option value="Togo">Togo</option>
                           <option value="Tokelau">Tokelau</option>
                           <option value="Tonga">Tonga</option>
                           <option value="Transnistria Pridnestrovie">Transnistria Pridnestrovie</option>
                           <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                           <option value="Tristan da Cunha">Tristan da Cunha</option>
                           <option value="Tunisia">Tunisia</option>
                           <option value="Turkey">Turkey</option>
                           <option value="Turkmenistan">Turkmenistan</option>
                           <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                           <option value="Tuvalu">Tuvalu</option>
                           <option value="Uganda">Uganda</option>
                           <option value="Ukraine">Ukraine</option>
                           <option value="United Arab Emirates">United Arab Emirates</option>
                           <option value="United Kingdom">United Kingdom</option>
                           <option value="Uruguay">Uruguay</option>
                           <option value="Uzbekistan">Uzbekistan</option>
                           <option value="Vanuatu">Vanuatu</option>
                           <option value="Vatican City">Vatican City</option>
                           <option value="Venezuela">Venezuela</option>
                           <option value="Vietnam">Vietnam</option>
                           <option value="British Virgin Islands">British Virgin Islands</option>
                           <option value="Isle of Man">Isle of Man</option>
                           <option value="US Virgin Islands">US Virgin Islands</option>
                           <option value="Wallis and Futuna">Wallis and Futuna</option>
                           <option value="Western Sahara">Western Sahara</option>
                           <option value="Yemen">Yemen</option>
                           <option value="Zambia">Zambia</option>
                           <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                     </div>
                     <span class="form-sub-label">
                        <div class="editor-container editorNoText" style="display: inline-block;">
                           <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false"></div>
                        </div>
                     </span>
                  </span>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_10" data-type="control_radio" data-qid="10" data-order="10" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_10" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">4. Status</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-single-column" role="group" aria-labelledby="label_10" data-component="radio">
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_10" type="radio" tabindex="-1" class="form-radio" id="input_10_0" name="q10_4Status10" value="Resident Individual">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_10_0" style="display: inline-block;">Resident Individual</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_10" type="radio" tabindex="-1" class="form-radio" id="input_10_1" name="q10_4Status10" value="Non Resident">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_10_1" style="display: inline-block;">Non Resident</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_10" type="radio" tabindex="-1" class="form-radio" id="input_10_2" name="q10_4Status10" value="Foreign National">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_10_2" style="display: inline-block;">Foreign National</label></div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_11" data-type="control_textbox" data-qid="11" data-order="11" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_11" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">5. PAN</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <span class="form-sub-label-container" style="vertical-align: top;">
                     <input type="text" id="input_11" name="q11_5Pan11" data-type="input-textbox" class="form-control" data-defaultvalue="" size="310" tabindex="-1" data-component="textbox" aria-labelledby="label_11" value="" style="width: 310px;"> 
                     <span class="form-sub-label">
                        <div class="editor-container editorNoText" style="display: inline-block;">
                           <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false"></div>
                        </div>
                     </span>
                  </span>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_12" data-type="control_radio" data-qid="12" data-order="12" data-selectioncount="0" class="form-group clearfix isNotSelected allowOtherEnabled lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_12" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">6. Proof of Identity Submitted for PAN Exempt Cases</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-single-column" role="group" aria-labelledby="label_12" data-component="radio">
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_12" type="radio" tabindex="-1" class="form-radio" id="input_12_0" name="q12_6Proof12" value="UID">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_12_0" style="display: inline-block;">UID</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_12" type="radio" tabindex="-1" class="form-radio" id="input_12_1" name="q12_6Proof12" value="Passport">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_12_1" style="display: inline-block;">Passport</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_12" type="radio" tabindex="-1" class="form-radio" id="input_12_2" name="q12_6Proof12" value="Voter ID">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_12_2" style="display: inline-block;">Voter ID</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_12" type="radio" tabindex="-1" class="form-radio" id="input_12_3" name="q12_6Proof12" value="Driving License">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_12_3" style="display: inline-block;">Driving License</label></div>
                        </span>
                     </span>
                     <span class="form-radio-item formRadioOther" style="clear: left;"><input type="radio" class="form-radio-other form-radio" name="q12_6Proof12" id="other_12" tabindex="0" aria-label="Other" value="other"><label id="label_other_12" for="other_12" style="text-indent: 0px;">Other</label><span id="other_12_input" class="other-input-container" style="display: none;"><input type="text" class="form-radio-other-input form-control" name="q12_6Proof12[other]" data-otherhint="Other" size="15" id="input_12" data-placeholder="Please type another option here" placeholder="Please type another option here"></span></span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_13" data-type="control_head" data-qid="13" data-order="13" data-selectioncount="0" class="form-group clearfix isNotSelected form-input-wide form-input-wide-line-fix lineAlignment-Left" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-header-group  header-default">
                     <div class="header-text httal htvam">
                        <h2 id="header_13" class="form-header" data-component="header">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">B. Address Details</div>
                           </div>
                        </h2>
                        <div id="subHeader_13" class="form-subHeader">
                           <div class="editor-container editorNoText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_14" data-type="control_address" data-qid="14" data-order="14" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_14" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">1. Address for Correspondence</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div summary="" class="form-address-table jsTest-addressField">
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-street-line jsTest-address-lineField">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_14_addr_line1" name="q14_1Address14[addr_line1]" class="form-control form-address-line" data-defaultvalue="" autocomplete="section-input_14 address-line1" tabindex="-1" data-component="address_line_1" aria-labelledby="label_14 sublabel_14_addr_line1" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Street Address</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-street-line jsTest-address-lineField">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_14_addr_line2" name="q14_1Address14[addr_line2]" class="form-control form-address-line" data-defaultvalue="" autocomplete="section-input_14 address-line2" tabindex="-1" data-component="address_line_2" aria-labelledby="label_14 sublabel_14_addr_line2" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Street Address Line 2</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_14_city" name="q14_1Address14[city]" class="form-control form-address-city" data-defaultvalue="" autocomplete="section-input_14 address-level2" tabindex="-1" data-component="city" aria-labelledby="label_14 sublabel_14_city" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">City</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                        <span class="form-address-line form-address-state-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_14_state" name="q14_1Address14[state]" class="form-control form-address-state" data-defaultvalue="" autocomplete="section-input_14 address-level1" tabindex="-1" data-component="state" aria-labelledby="label_14 sublabel_14_state" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">State / Province</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-zip-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_14_postal" name="q14_1Address14[postal]" class="form-control form-address-postal" data-defaultvalue="" autocomplete="section-input_14 postal-code" tabindex="-1" data-component="zip" aria-labelledby="label_14 sublabel_14_postal" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Postal / Zip Code</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                        <span class="form-address-line form-address-country-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <select class="form-dropdown form-address-country noTranslate" name="q14_1Address14[country]" id="input_14_country" data-component="country" tabindex="-1" disabled="" required="" aria-labelledby="label_14 sublabel_14_country" autocomplete="section-input_14 country">
                                 <option value="">Please Select</option>
                                 <option value="United States">United States</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="The Bahamas">The Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Curacao">Curacao</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands">Falkland Islands</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="The Gambia">The Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guernsey">Guernsey</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guinea-Bissau">Guinea-Bissau</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jersey">Jersey</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="North Korea">North Korea</option>
                                 <option value="South Korea">South Korea</option>
                                 <option value="Kosovo">Kosovo</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macau">Macau</option>
                                 <option value="Macedonia">Macedonia</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Micronesia">Micronesia</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montenegro">Montenegro</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                                 <option value="Namibia">Namibia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="Netherlands Antilles">Netherlands Antilles</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern Cyprus</option>
                                 <option value="Northern Mariana">Northern Mariana</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau">Palau</option>
                                 <option value="Palestine">Palestine</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Pitcairn Islands">Pitcairn Islands</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Republic of the Congo">Republic of the Congo</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="Saint Barthelemy">Saint Barthelemy</option>
                                 <option value="Saint Helena">Saint Helena</option>
                                 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                 <option value="Saint Lucia">Saint Lucia</option>
                                 <option value="Saint Martin">Saint Martin</option>
                                 <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                 <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Serbia">Serbia</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="Somaliland">Somaliland</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="South Ossetia">South Ossetia</option>
                                 <option value="South Sudan">South Sudan</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Svalbard">Svalbard</option>
                                 <option value="eSwatini">eSwatini</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Taiwan">Taiwan</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Timor-Leste">Timor-Leste</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Transnistria Pridnestrovie">Transnistria Pridnestrovie</option>
                                 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                 <option value="Tristan da Cunha">Tristan da Cunha</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="Uruguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City">Vatican City</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="British Virgin Islands">British Virgin Islands</option>
                                 <option value="Isle of Man">Isle of Man</option>
                                 <option value="US Virgin Islands">US Virgin Islands</option>
                                 <option value="Wallis and Futuna">Wallis and Futuna</option>
                                 <option value="Western Sahara">Western Sahara</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                                 <option value="other">Other</option>
                              </select>
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Country</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_15" data-type="control_phone" data-qid="15" data-order="15" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_15" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">2. Phone Number</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <span class="form-sub-label-container" style="vertical-align: top;">
                     <input type="tel" id="input_15_full" name="q15_2Phone15[full]" data-type="mask-number" class="mask-phone-number form-control validate[Fill Mask]" data-defaultvalue="" autocomplete="section-input_15 tel-national" data-masked="true" tabindex="-1" placeholder="(000) 000-0000" data-component="phone" aria-labelledby="label_15 sublabel_15_masked" value="" style="width: 310px;"> 
                     <span class="form-sub-label">
                        <div class="editor-container editorHasText" style="display: inline-block;">
                           <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Please enter a valid phone number.</div>
                        </div>
                     </span>
                  </span>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_16" data-type="control_email" data-qid="16" data-order="16" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_16" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">3. Email</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <span class="form-sub-label-container" style="vertical-align: top;">
                     <input type="email" id="input_16" name="q16_3Email16" class="form-control validate[Email]" data-defaultvalue="" size="310" tabindex="-1" data-component="email" aria-labelledby="label_16 sublabel_input_16" value="" style="width: 310px;"> 
                     <span class="form-sub-label">
                        <div class="editor-container editorHasText" style="display: inline-block;">
                           <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">example@example.com</div>
                        </div>
                     </span>
                  </span>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_17" data-type="control_checkbox" data-qid="17" data-order="17" data-selectioncount="0" class="form-group clearfix isNotSelected allowOtherEnabled lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_17" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">4. Proof of Address to be Provided by Applicant</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-multiple-column" data-columncount="2" role="group" aria-labelledby="label_17" data-component="checkbox">
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_0" name="q17_4Proof[]" value="Passport">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_0" style="display: inline-block;">Passport</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_1" name="q17_4Proof[]" value="Ration Card">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_1" style="display: inline-block;">Ration Card</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_2" name="q17_4Proof[]" value="Driving License">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_2" style="display: inline-block;">Driving License</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_3" name="q17_4Proof[]" value="Voter Identity Card">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_3" style="display: inline-block;">Voter Identity Card</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_4" name="q17_4Proof[]" value="Registered Lease/Sale Agreement of Residence">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_4" style="display: inline-block;">Registered Lease/Sale Agreement of Residence</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_5" name="q17_4Proof[]" value="Latest Bank Account Statement/Passbook">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_5" style="display: inline-block;">Latest Bank Account Statement/Passbook</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_6" name="q17_4Proof[]" value="Latest Telephone Bill">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_6" style="display: inline-block;">Latest Telephone Bill</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_7" name="q17_4Proof[]" value="Latest Electricity Bill">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_7" style="display: inline-block;">Latest Electricity Bill</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_17" type="checkbox" tabindex="-1" class="form-checkbox" id="input_17_8" name="q17_4Proof[]" value="Latest Gas Bill">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_17_8" style="display: inline-block;">Latest Gas Bill</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item formCheckboxOther"><input type="checkbox" class="form-checkbox-other form-checkbox" name="q17_4Proof[other]" id="other_17" tabindex="0" aria-label="Other" value="other"><label id="label_other_17" for="other_17" style="text-indent: 0px;">Other</label><span id="other_17_input" class="other-input-container" style="display: none;"><input type="text" class="form-checkbox-other-input form-control" name="q17_4Proof[other]" data-otherhint="Other" size="15" id="input_17" data-placeholder="Please type another option here" placeholder="Please type another option here"></span></span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_18" data-type="control_address" data-qid="18" data-order="18" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_18" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">5. Permanent Address of Resident Applicant If Different From B1 Above</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div summary="" class="form-address-table jsTest-addressField">
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-street-line jsTest-address-lineField">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_18_addr_line1" name="q18_5Permanent18[addr_line1]" class="form-control form-address-line" data-defaultvalue="" autocomplete="section-input_18 address-line1" tabindex="-1" data-component="address_line_1" aria-labelledby="label_18 sublabel_18_addr_line1" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Street Address</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-street-line jsTest-address-lineField">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_18_addr_line2" name="q18_5Permanent18[addr_line2]" class="form-control form-address-line" data-defaultvalue="" autocomplete="section-input_18 address-line2" tabindex="-1" data-component="address_line_2" aria-labelledby="label_18 sublabel_18_addr_line2" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Street Address Line 2</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_18_city" name="q18_5Permanent18[city]" class="form-control form-address-city" data-defaultvalue="" autocomplete="section-input_18 address-level2" tabindex="-1" data-component="city" aria-labelledby="label_18 sublabel_18_city" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">City</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                        <span class="form-address-line form-address-state-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_18_state" name="q18_5Permanent18[state]" class="form-control form-address-state" data-defaultvalue="" autocomplete="section-input_18 address-level1" tabindex="-1" data-component="state" aria-labelledby="label_18 sublabel_18_state" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">State / Province</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-zip-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <input type="text" id="input_18_postal" name="q18_5Permanent18[postal]" class="form-control form-address-postal" data-defaultvalue="" autocomplete="section-input_18 postal-code" tabindex="-1" data-component="zip" aria-labelledby="label_18 sublabel_18_postal" required="" value=""> 
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Postal / Zip Code</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                        <span class="form-address-line form-address-country-line jsTest-address-lineField ">
                           <span class="form-sub-label-container" style="vertical-align: top;">
                              <select class="form-dropdown form-address-country noTranslate" name="q18_5Permanent18[country]" id="input_18_country" data-component="country" tabindex="-1" disabled="" required="" aria-labelledby="label_18 sublabel_18_country" autocomplete="section-input_18 country">
                                 <option value="">Please Select</option>
                                 <option value="United States">United States</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="The Bahamas">The Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Curacao">Curacao</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands">Falkland Islands</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="The Gambia">The Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guernsey">Guernsey</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guinea-Bissau">Guinea-Bissau</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jersey">Jersey</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="North Korea">North Korea</option>
                                 <option value="South Korea">South Korea</option>
                                 <option value="Kosovo">Kosovo</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macau">Macau</option>
                                 <option value="Macedonia">Macedonia</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Micronesia">Micronesia</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montenegro">Montenegro</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                                 <option value="Namibia">Namibia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="Netherlands Antilles">Netherlands Antilles</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern Cyprus</option>
                                 <option value="Northern Mariana">Northern Mariana</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau">Palau</option>
                                 <option value="Palestine">Palestine</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Pitcairn Islands">Pitcairn Islands</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Republic of the Congo">Republic of the Congo</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="Saint Barthelemy">Saint Barthelemy</option>
                                 <option value="Saint Helena">Saint Helena</option>
                                 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                 <option value="Saint Lucia">Saint Lucia</option>
                                 <option value="Saint Martin">Saint Martin</option>
                                 <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                 <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Serbia">Serbia</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="Somaliland">Somaliland</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="South Ossetia">South Ossetia</option>
                                 <option value="South Sudan">South Sudan</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Svalbard">Svalbard</option>
                                 <option value="eSwatini">eSwatini</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Taiwan">Taiwan</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Timor-Leste">Timor-Leste</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Transnistria Pridnestrovie">Transnistria Pridnestrovie</option>
                                 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                 <option value="Tristan da Cunha">Tristan da Cunha</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="Uruguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City">Vatican City</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="British Virgin Islands">British Virgin Islands</option>
                                 <option value="Isle of Man">Isle of Man</option>
                                 <option value="US Virgin Islands">US Virgin Islands</option>
                                 <option value="Wallis and Futuna">Wallis and Futuna</option>
                                 <option value="Western Sahara">Western Sahara</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                                 <option value="other">Other</option>
                              </select>
                              <span class="form-sub-label">
                                 <div class="editor-container editorHasText" style="display: inline-block;">
                                    <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Country</div>
                                 </div>
                              </span>
                           </span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_19" data-type="control_checkbox" data-qid="19" data-order="19" data-selectioncount="0" class="form-group clearfix isNotSelected allowOtherEnabled lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_19" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">6. Proof of Address to be Provided by Applicant</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-multiple-column" data-columncount="2" role="group" aria-labelledby="label_19" data-component="checkbox">
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_0" name="q19_6Proof19[]" value="Passport">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_0" style="display: inline-block;">Passport</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_1" name="q19_6Proof19[]" value="Ration Card">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_1" style="display: inline-block;">Ration Card</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_2" name="q19_6Proof19[]" value="Driving License">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_2" style="display: inline-block;">Driving License</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_3" name="q19_6Proof19[]" value="Voter Identity Card">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_3" style="display: inline-block;">Voter Identity Card</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_4" name="q19_6Proof19[]" value="Registered Lease/Sale Agreement of Residence">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_4" style="display: inline-block;">Registered Lease/Sale Agreement of Residence</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_5" name="q19_6Proof19[]" value="Latest Bank Account Statement/Passbook">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_5" style="display: inline-block;">Latest Bank Account Statement/Passbook</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_6" name="q19_6Proof19[]" value="Latest Telephone Bill">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_6" style="display: inline-block;">Latest Telephone Bill</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_7" name="q19_6Proof19[]" value="Latest Electricity Bill">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_7" style="display: inline-block;">Latest Electricity Bill</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_19" type="checkbox" tabindex="-1" class="form-checkbox" id="input_19_8" name="q19_6Proof19[]" value="Latest Gas Bill">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_19_8" style="display: inline-block;">Latest Gas Bill</label></div>
                        </span>
                     </span>
                     <span class="form-checkbox-item formCheckboxOther"><input type="checkbox" class="form-checkbox-other form-checkbox" name="q19_6Proof19[other]" id="other_19" tabindex="0" aria-label="Other" value="other"><label id="label_other_19" for="other_19" style="text-indent: 0px;">Other</label><span id="other_19_input" class="other-input-container" style="display: none;"><input type="text" class="form-checkbox-other-input form-control" name="q19_6Proof19[other]" data-otherhint="Other" size="15" id="input_19" data-placeholder="Please type another option here" placeholder="Please type another option here"></span></span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_26" data-type="control_head" data-qid="26" data-order="20" data-selectioncount="0" class="form-group clearfix isNotSelected form-input-wide form-input-wide-line-fix lineAlignment-Left" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-header-group  header-default">
                     <div class="header-text httal htvam">
                        <h2 id="header_26" class="form-header" data-component="header">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">C. File Upload</div>
                           </div>
                        </h2>
                        <div id="subHeader_26" class="form-subHeader">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false">Please upload related photographs and documents.</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_25" data-type="control_fileupload" data-qid="25" data-order="21" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_25" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorNoText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;"></div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="jfQuestion-fields" data-wrapper-react="true">
                     <div class="jfField isFilled">
                        <div class="jfUpload-wrapper">
                           <div class="jfUpload-container">
                              <div class="jfUpload-text-container">
                                 <div class="jfUpload-icon forDesktop">
                                    <input type="file" id="myfile" name="myfile">
                                     </div>
                              </div>
                              <div class="jfUpload-button-container">
                                 <div class="jfUpload-button" aria-hidden="true" tabindex="0" data-version="v2" style="display: none;">
                                    <div class="editor-container editorHasText" style="display: inline-block;">
                                       <div class="inlineEditor" placeholder="" format="text" contenteditable="true" data-gramm="false">Browse Files</div>
                                    </div>
                                    <div class="jfUpload-heading forDesktop">Drag and drop files here</div>
                                    <div class="jfUpload-heading forMobile">Choose a file</div>
                                 </div>
                              </div>
                           </div>
                           <div class="jfUpload-files-container">
                              <div class="qq-uploader" data-component="fileupload">
                                 <div class="form-upload-multiple qq-upload-button">
                                    Browse Files
                                    <div class="jfUpload-heading forDesktop">Drag and drop files here</div>
                                    <div class="jfUpload-heading forMobile">Choose a file</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <span class="form-sub-label">
                              <div class="editor-container editorNoText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false"></div>
                              </div>
                           </span>
                        </span>
                     </div>
                     <span class="cancelText" style="display: none;">Cancel</span><span class="ofText" style="display: none;">of</span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_20" data-type="control_head" data-qid="20" data-order="22" data-selectioncount="0" class="form-group clearfix isNotSelected form-input-wide form-input-wide-line-fix lineAlignment-Left" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-header-group  header-default">
                     <div class="header-text httal htvam">
                        <h2 id="header_20" class="form-header" data-component="header">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">D. Declaration</div>
                           </div>
                        </h2>
                        <div id="subHeader_20" class="form-subHeader">
                           <div class="editor-container editorNoText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_21" data-type="control_text" data-qid="21" data-order="23" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-None" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div id="text_21" class="form-html" data-component="text">I hereby declare that the information provided in this form is accurate and complete. I confirm that any information is found incorrect and/or incomplete that leads a violation of regulations may initiate legal actions, and I accept that I am the responsible party for any and all charges, penalties and violations.</div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_27" data-type="control_fullname" data-qid="27" data-order="24" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_27" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Name of the Applicant</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div data-wrapper-react="true">
                     <span class="form-sub-label-container" data-input-type="first" style="vertical-align: top;">
                        <input type="text" id="first_27" name="q27_nameOf27[first]" class="form-control" data-defaultvalue="" autocomplete="section-input_27 given-name" size="10" tabindex="-1" data-component="first" aria-labelledby="label_27 sublabel_27_first" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">First Name</div>
                           </div>
                        </span>
                     </span>
                     <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                        <input type="text" id="last_27" name="q27_nameOf27[last]" class="form-control" data-defaultvalue="" autocomplete="section-input_27 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_27 sublabel_27_last" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Last Name</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_22" data-type="control_signature" data-qid="22" data-order="25" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_22" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Signature of the Applicant</div>
                  </div>
               </label>
               <div id="signature-pad" class="m-signature-pad">
    <div class="m-signature-pad--body">
        <canvas></canvas>
        <input type="hidden" name="signature" id="signature" value="">
    </div>
</div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_28" data-type="control_datetime" data-qid="28" data-order="26" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper questionWrapper  false">
               <label id="label_28" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Date Signed</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <div data-wrapper-react="true">
                     <div style="display: none;">
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="month_28" name="q28_dateSigned28[month]" type="tel" size="2" data-maxlength="2" data-age="" maxlength="2" autocomplete="section-input_28 off" aria-labelledby="label_28 sublabel_28_month" value="04"><span class="date-separate" aria-hidden="true">&nbsp;-</span>
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Month</div>
                              </div>
                           </span>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="currentDate form-control validate[limitDate]" id="day_28" name="q28_dateSigned28[day]" type="tel" size="2" data-maxlength="2" data-age="" maxlength="2" autocomplete="section-input_28 off" aria-labelledby="label_28 sublabel_28_day" value="03"><span class="date-separate" aria-hidden="true">&nbsp;-</span>
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Day</div>
                              </div>
                           </span>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="year_28" name="q28_dateSigned28[year]" type="tel" size="4" data-maxlength="4" data-age="" maxlength="4" autocomplete="section-input_28 off" aria-labelledby="label_28 sublabel_28_year" value="2022"> 
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Year</div>
                              </div>
                           </span>
                        </span>
                     </div>
                     <span class="form-sub-label-container" style="vertical-align: top;">
                        <input class="form-control validate[limitDate, validateLiteDate]" id="lite_mode_28" type="text" size="12" data-maxlength="12" maxlength="12" data-age="" data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY" disabled="" autocomplete="section-input_28 off" aria-labelledby="label_28 sublabel_28_litemode" value="04-03-2022"><img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_28_pick" src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v2"> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Date</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_23" data-type="control_head" data-qid="23" data-order="27" data-selectioncount="0" class="form-group clearfix isNotSelected form-input-wide form-input-wide-line-fix lineAlignment-Left" style="z-index: 1;">
            <div class="question-wrapper isHidden false">
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-header-group  header-default">
                     <div class="header-text httal htvam">
                        <h2 id="header_23" class="form-header" data-component="header">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a header" format="text" contenteditable="true" data-gramm="false">For Office Use Only</div>
                           </div>
                        </h2>
                        <div id="subHeader_23" class="form-subHeader">
                           <div class="editor-container editorNoText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a subheader" format="text" contenteditable="true" data-gramm="false"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="hidden-field-warning"><span name="cw_moreinfo" class="ji ji-cw_moreinfo"></span>This field is hidden and will not be seen on the form.</div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_29" data-type="control_radio" data-qid="29" data-order="28" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper isHidden false">
               <label id="label_29" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Type a question</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div class="form-single-column" role="group" aria-labelledby="label_29" data-component="radio">
                     <span class="form-radio-item" style="clear: left;">
                        <span class="dragger-item"></span><input aria-describedby="label_29" type="radio" tabindex="-1" class="form-radio" id="input_29_0" name="q29_typeA" value="Originals verified and Self-Attested Document copies received">
                        <span>
                           <div class="editor-container editorHasText" style="display: inline-block;"><label class="inlineEditor" placeholder="Type an option" format="text" contenteditable="true" data-gramm="false" id="label_input_29_0" style="display: inline-block;">Originals verified and Self-Attested Document copies received</label></div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="hidden-field-warning"><span name="cw_moreinfo" class="ji ji-cw_moreinfo"></span>This field is hidden and will not be seen on the form.</div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_30" data-type="control_fullname" data-qid="30" data-order="29" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper isHidden false">
               <label id="label_30" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Name of the Authorized Signatory</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div data-wrapper-react="true">
                     <span class="form-sub-label-container" data-input-type="first" style="vertical-align: top;">
                        <input type="text" id="first_30" name="q30_nameOf30[first]" class="form-control" data-defaultvalue="" autocomplete="section-input_30 given-name" size="10" tabindex="-1" data-component="first" aria-labelledby="label_30 sublabel_30_first" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">First Name</div>
                           </div>
                        </span>
                     </span>
                     <span class="form-sub-label-container" data-input-type="last" style="vertical-align: top;">
                        <input type="text" id="last_30" name="q30_nameOf30[last]" class="form-control" data-defaultvalue="" autocomplete="section-input_30 family-name" size="15" tabindex="-1" data-component="last" aria-labelledby="label_30 sublabel_30_last" value=""> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Last Name</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="hidden-field-warning"><span name="cw_moreinfo" class="ji ji-cw_moreinfo"></span>This field is hidden and will not be seen on the form.</div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_31" data-type="control_signature" data-qid="31" data-order="30" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper isHidden false">
               <label id="label_31" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Signature of the Authorized Signatory</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="full" style="position: relative;">
                  <div data-wrapper-react="true">
                     <div class="signature-pad-passive" style="width: 310px; height: 114px;">
                        <div class="signature-line"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="hidden-field-warning"><span name="cw_moreinfo" class="ji ji-cw_moreinfo"></span>This field is hidden and will not be seen on the form.</div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_32" data-type="control_datetime" data-qid="32" data-order="31" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto-Top" style="z-index: 1;">
            <div class="question-wrapper isHidden false">
               <label id="label_32" class="form-label form-label-top form-label-auto" for="none" style="width: 100%;">
                  <div class="editor-container editorHasText" style="display: inline; width: 100%;">
                     <div class="inlineEditor" placeholder="Type a question" format="text" contenteditable="true" data-gramm="false" style="width: 100%;">Date Signed</div>
                  </div>
               </label>
               <div class="form-input-wide" data-layout="half" style="position: relative;">
                  <div data-wrapper-react="true">
                     <div style="display: none;">
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="month_32" name="q32_dateSigned32[month]" type="tel" size="2" data-maxlength="2" data-age="" maxlength="2" autocomplete="section-input_32 off" aria-labelledby="label_32 sublabel_32_month" value=""><span class="date-separate" aria-hidden="true">&nbsp;-</span>
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Month</div>
                              </div>
                           </span>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="day_32" name="q32_dateSigned32[day]" type="tel" size="2" data-maxlength="2" data-age="" maxlength="2" autocomplete="section-input_32 off" aria-labelledby="label_32 sublabel_32_day" value=""><span class="date-separate" aria-hidden="true">&nbsp;-</span>
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Day</div>
                              </div>
                           </span>
                        </span>
                        <span class="form-sub-label-container" style="vertical-align: top;">
                           <input readonly="" class="form-control validate[limitDate]" id="year_32" name="q32_dateSigned32[year]" type="tel" size="4" data-maxlength="4" data-age="" maxlength="4" autocomplete="section-input_32 off" aria-labelledby="label_32 sublabel_32_year" value=""> 
                           <span class="form-sub-label">
                              <div class="editor-container editorHasText" style="display: inline-block;">
                                 <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Year</div>
                              </div>
                           </span>
                        </span>
                     </div>
                     <span class="form-sub-label-container" style="vertical-align: top;">
                        <input class="form-control validate[limitDate, validateLiteDate]" id="lite_mode_32" type="text" size="12" data-maxlength="12" maxlength="12" data-age="" data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY" disabled="" autocomplete="section-input_32 off" aria-labelledby="label_32 sublabel_32_litemode" value=""><img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_32_pick" src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v2"> 
                        <span class="form-sub-label">
                           <div class="editor-container editorHasText" style="display: inline-block;">
                              <div class="inlineEditor" placeholder="Type a sublabel" format="text" contenteditable="true" data-gramm="false">Date</div>
                           </div>
                        </span>
                     </span>
                  </div>
               </div>
            </div>
            <div class="hidden-field-warning"><span name="cw_moreinfo" class="ji ji-cw_moreinfo"></span>This field is hidden and will not be seen on the form.</div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
         <li id="id_2" data-type="control_button" data-qid="2" data-order="32" data-selectioncount="0" class="form-group clearfix isNotSelected lineAlignment-Auto lastOne" style="z-index: 1;">
            <div>
               <div class="question-wrapper questionWrapper  false">
                  <div class="form-input-wide" data-layout="full" style="position: relative;">
                     <div data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                        <div class="editor-container editorHasText" style="display: inline-block;"><button class="btn btn-primary" type="submit">Update Now</button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dragHandle">
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
               <div class="dragHandle-point"></div>
            </div>
            <div id="app_wizards" class="moodular collabUsers-userList"></div>
         </li>
      </ul>
   </div>
  
     
</div>

<style>

</style>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
  
  @endsection