@extends('layouts.front.default')
@section('content')
<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
  

  
  <!-- Content
  ============================================= -->
  <div id="content">
    <div class="hero-wrap py-4 py-md-5">
      <div class="hero-mask opacity-7 bg-dark"></div>
      <div class="hero-bg" style="background-image:url(asset('assets/front/images/bg/image-3.jpg')"></div>
      <div class="hero-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="position-relative px-4 pt-3 pb-4">
                <div class="hero-mask opacity-8 bg-primary rounded"></div>
                <div class="hero-content">
                  <!-- Tabs -->
                  <ul class="nav nav-tabs border-bottom style-3" id="myTab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true"><span><i class="fas fa-mobile-alt"></i></span> Mobile</a> </li>
            <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false"><span><i class="fas fa-tv"></i></span> DTH</a> </li>
            <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false"><span><i class="fas fa-credit-card"></i></span> DataCard</a> </li>
            <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false"><span><i class="fas fa-wifi"></i></span> Broadband</a> </li>
            <li class="nav-item"> <a class="nav-link" id="fifth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="fifth" aria-selected="false"><span><i class="fas fa-phone"></i></span> Landline</a> </li>
            <li class="nav-item"> <a class="nav-link" id="sixth-tab" data-toggle="tab" href="#sixth" role="tab" aria-controls="sixth" aria-selected="false"><span><i class="fas fa-plug"></i></span> CableTv</a> </li>
            <li class="nav-item"> <a class="nav-link" id="seventh-tab" data-toggle="tab" href="#seventh" role="tab" aria-controls="seventh" aria-selected="false"><span><i class="fas fa-lightbulb"></i></span> Electricity</a> </li>
            <li class="nav-item"> <a class="nav-link" id="eighth-tab" data-toggle="tab" href="#eighth" role="tab" aria-controls="eighth" aria-selected="false"><span><i class="fas fa-subway"></i></span> Metro</a> </li>
            <li class="nav-item"> <a class="nav-link" id="ninth-tab" data-toggle="tab" href="#ninth" role="tab" aria-controls="ninth" aria-selected="false"><span><i class="fas fa-flask"></i></span> Gas</a> </li>
            <li class="nav-item"> <a class="nav-link" id="tenth-tab" data-toggle="tab" href="#tenth" role="tab" aria-controls="tenth" aria-selected="false"><span><i class="fas fa-tint"></i></span> Water</a> </li>
          </ul>
                  <div class="tab-content pt-4" id="myTabContent">
                    <!-- Mobile -->
                    <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                      <form id="recharge-bill" class="search-input-line" method="post">
                        <div class="text-light mb-3">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input id="prepaid" name="rechargeBillpayment" class="custom-control-input" checked="" required type="radio">
                            <label class="custom-control-label" for="prepaid">Prepaid</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input id="postpaid" name="rechargeBillpayment" class="custom-control-input" required type="radio">
                            <label class="custom-control-label" for="postpaid">Postpaid</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="mobileNumber" required placeholder="Enter Mobile Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="mobileoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-3 form-group"> <a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link text-light opacity-7">View Plans</a>
                            <input class="form-control" id="mobileamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Dth -->
                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                      <form id="dthRechargeBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="dthoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="cardNumber" required placeholder="Enter Your Card Number">
                          </div>
                          <div class="col-lg-3 form-group"> <a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link text-light opacity-7">View Plans</a>
                            <input class="form-control" id="dthamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- DataCard -->
                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                      <form id="datacardRechargeBill" class="search-input-line" method="post">
                        <div class="text-light mb-3">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input id="DataCardprepaid" name="rechargeBillpayment" class="custom-control-input" checked="" required type="radio">
                            <label class="custom-control-label" for="DataCardprepaid">Prepaid</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input id="DataCardpostpaid" name="rechargeBillpayment" class="custom-control-input" required type="radio">
                            <label class="custom-control-label" for="DataCardpostpaid">Postpaid</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="dataCardNumber" required placeholder="Enter DataCard Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="DataCardoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-3 form-group"> <a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link text-light opacity-7">View Plans</a>
                            <input class="form-control" id="DataCardamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Broadbanad -->
                    <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
                      <form id="broadbanadBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="brodbandoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="telephoneNumber" required placeholder="Enter Telephone Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <input class="form-control" id="brodbandamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Landline -->
                    <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
                      <form id="landlineBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="landlineoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="telephoneNumber" required placeholder="Enter Telephone Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <input class="form-control" id="landlineamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- cableTv -->
                    <div class="tab-pane fade" id="sixth" role="tabpanel" aria-labelledby="sixth-tab">
                      <form id="cableTvRechargeBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="cabletvoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="accountNumber" required placeholder="Enter Account Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <input class="form-control" id="cabletvamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Electricity -->
                    <div class="tab-pane fade" id="seventh" role="tabpanel" aria-labelledby="seventh-tab">
                      <form id="electricityBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-row">
                              <div class="col-lg-3 form-group">
                                <select class="custom-select" id="electricityoperator" required="">
                                  <option value="">Select Your Operator</option>
                                  <option>1st Operator</option>
                                  <option>2nd Operator</option>
                                  <option>3rd Operator</option>
                                  <option>4th Operator</option>
                                  <option>5th Operator</option>
                                  <option>6th Operator</option>
                                  <option>7th Operator</option>
                                </select>
                              </div>
                              <div class="col-lg-3 form-group">
                                <select class="custom-select" id="yourState" required="">
                                  <option value="">Select Your State</option>
                                  <option>1st State</option>
                                  <option>2nd State</option>
                                  <option>3rd State</option>
                                  <option>4th State</option>
                                  <option>5th State</option>
                                  <option>6th State</option>
                                  <option>7th State</option>
                                  <option>8th State</option>
                                  <option>9th State</option>
                                  <option>10th State</option>
                                  <option>11th State</option>
                                  <option>12th State</option>
                                  <option>13th State</option>
                                  <option>14th State</option>
                                </select>
                              </div>
                              <div class="col-lg-3 form-group">
                                <input type="text" class="form-control" data-bv-field="number" id="serviceNumber" required placeholder="Enter Service Number">
                              </div>
                              <div class="col-lg-3 form-group">
                                <input class="form-control" id="electricityamount" placeholder="Enter Amount" required type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Metro -->
                    <div class="tab-pane fade" id="eighth" role="tabpanel" aria-labelledby="eighth-tab">
                      <form id="metroCardRecharge" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="metrooperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="cardNumber" required placeholder="Enter Card Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <input class="form-control" id="metroamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Gas -->
                    <div class="tab-pane fade" id="ninth" role="tabpanel" aria-labelledby="ninth-tab">
                      <form id="gasBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="gasoperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="consumerNumber" required placeholder="Enter Consumer Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <input class="form-control" id="gasamount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Water -->
                    <div class="tab-pane fade" id="tenth" role="tabpanel" aria-labelledby="tenth-tab">
                      <form id="waterBill" class="search-input-line" method="post">
                        <div class="row">
                          <div class="col-lg-3 form-group">
                            <select class="custom-select" id="wateroperator" required="">
                              <option value="">Select Your Operator</option>
                              <option>1st Operator</option>
                              <option>2nd Operator</option>
                              <option>3rd Operator</option>
                              <option>4th Operator</option>
                              <option>5th Operator</option>
                              <option>6th Operator</option>
                              <option>7th Operator</option>
                            </select>
                          </div>
                          <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" data-bv-field="number" id="waterconsumerNumber" required placeholder="Enter Consumer Number">
                          </div>
                          <div class="col-lg-3 form-group">
                            <input class="form-control" id="wateramount" placeholder="Enter Amount" required type="text">
                          </div>
                          <div class="col-lg-2 form-group">
                            <button class="btn btn-light btn-block btn-book" type="submit"><i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Tabs end --> 
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
     <!-- Banner
    ============================================= -->
    <div class="bg-white shadow-md pt-0 pb-0">
    <img class="img-fluid" src="{{ asset('assets/front/images/slider/banner-12.jpg') }}" alt="banner 5">    
            </div><!-- Banner end -->

    
     <!-- Banner
    ============================================= -->
    <div class="bg-white shadow-md pt-5 pb-5">
      <div class="container">
     <div class="row">
      <div class="col-lg-6">
     <a href="#"><img class="img-fluid" src="{{ asset('assets/front/images/slider/booking-banner-8.jpg') }}" alt="banner 5"></a>
      </div>
      <div class="col-lg-6">
     <a href="#"><img class="img-fluid" src="{{ asset('assets/front/images/slider/booking-banner-2.jpg') }}" alt="banner 5"></a>
      </div>
      </div>
      </div>
      </div><!-- Banner end -->
   

    
    <div class="bg-white shadow-md bg-secondary">
     <div class="col-lg-12 py-5">
              <h2 class="text-9 font-weight-600 text-light text-center">Why Recharge with PayONEHub ?</h2>
              <p class="lead mb-4 text-light text-center">Online Recharge. Save Time and Money!</p>
              <div class="row">
                <div class="col-lg-4">
                  <div class="featured-box style-1 mb-4 mb-lg-0">
                    <div class="featured-box-icon text-light"> <i class="fas fa-ribbon"></i></div>
                    <h3 class="text-light">Money-back guarantee</h3>
                    <p class="text-light opacity-8">Get instant refund and get any recharge fees waived off! Easy cancellation process is available.</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="featured-box style-1 mb-4 mb-lg-0">
                    <div class="featured-box-icon text-light"> <i class="fas fa-lock"></i></div>
                    <h3 class="text-light">Safe and secure payments</h3>
                    <p class="text-light opacity-8">Always get cheapest price with the best in the industry. So you get the best deal every time.</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="featured-box style-1 mb-4 mb-lg-0">
                    <div class="featured-box-icon text-light"> <i class="fas fa-ticket-alt"></i></div>
                    <h3 class="text-light"> No unexpected fees</h3>
                    <p class="text-light opacity-8">No hidden charges, no payment fees, and free customer service. So you get the best deal every time!</p>
                  </div>
                </div>
              </div>
            </div>
            
            
            
   
    
    
   <section class="section bg-white shadow-md">
      <div class="container">
        <h2 class="text-9 font-weight-500 text-center">Featured Offers</h2>
        <p class="lead text-center mb-4">Get Best Offers &amp; Discounts</p>
        <div class="row banner">
         <!-- <div class="col-md-6">
            <div class="item rounded"> <a href="#">
              <div class="caption">
                <h2>Save 20% on Recharge &amp; Bill</h2>
                <p>Use Code: Recharge20</p>
              </div>
              <div class="banner-mask"></div>
              <img class="img-fluid" src="images/slider/small-banner-11-600x220.jpg" alt="banner"> </a> </div>
          </div>
          <div class="col-md-6">
            <div class="item rounded"> <a href="#">
              <div class="caption">
                <h2>5% OFF on Bill Payment</h2>
                <p>Use Code: Bill5</p>
              </div>
              <div class="banner-mask"></div>
              <img class="img-fluid" src="images/slider/small-banner-12-600x220.jpg" alt="banner"> </a> </div>
          </div>
        </div>-->
        <div class="row banner mt-4 mb-2">
          <div class="col-md-4">
            <div class="item rounded"> <a href="#">
              <div class="caption">
                <h2>10% OFF</h2>
                <p>On Metro Booking</p>
              </div>
              <div class="banner-mask"></div>
              <img class="img-fluid" src="{{ asset('assets/front/images/slider/small-banner-13-600x320.jpg') }}" alt="banner"> </a> </div>
          </div>
          <div class="col-md-4 mt-4 mt-md-0">
            <div class="item rounded"> <a href="#">
              <div class="caption">
                <h2>15% OFF</h2>
                <p>On electricity Bill Payment</p>
              </div>
              <div class="banner-mask"></div>
              <img class="img-fluid" src="{{ asset('assets/front/images/slider/small-banner-14-600x320.jpg') }}" alt="banner"> </a> </div>
          </div>
          <div class="col-md-4 mt-4 mt-md-0">
            <div class="item rounded"> <a href="#">
              <div class="caption">
                <h2>10% OFF</h2>
                <p>On DTH Recharge</p>
              </div>
              <div class="banner-mask"></div>
              <img class="img-fluid" src="{{ asset('assets/front/images/slider/small-banner-15-600x320.jpg') }}" alt="banner"> </a> </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <!-- Refer & Earn
    ============================================= -->
    <section class="section bg-light shadow-md px-5">
      <div class="container">
        <h2 class="text-9 font-weight-600 text-center">Refer & Earn</h2>
        <p class="lead text-dark text-center mb-5">Refer your friends and earn up to $20.</p>
        <div class="row">
          <div class="col-md-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon border border-primary text-primary rounded-circle"> <span class="w-100 text-12 font-weight-500">1</span> </div>
              <h3>You Refer Friends</h3>
              <p class="text-3">Share your referral link with friends. They get $10.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon border border-primary text-primary rounded-circle"> <span class="w-100 text-12 font-weight-500">2</span> </div>
              <h3>Your Friends Register</h3>
              <p class="text-3">Your friends Register with using your referral link.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon border border-primary text-primary rounded-circle"> <span class="w-100 text-12 font-weight-500">3</span> </div>
              <h3>Earn You</h3>
              <p class="text-3">You get $20. You can use these credits to take recharge.</p>
            </div>
          </div>
        </div>
        <div class="text-center pt-4"> <a href="#" class="btn btn-primary">Get Started Earn</a> </div>
      </div>
    </section>
    <!-- Refer & Earn end --> 
    
    
    
    <!-- Mobile App
    ============================================= -->
    <section class="hero-wrap section pb-5 pb-lg-4">
      <div class="hero-bg" style="background-image:url(asset('assets/front/images/bg/image-5.jpg')"></div>
      <div class="hero-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-center"> <img class="img-fluid" alt="" src="{{ asset('assets/front/images/app-mobile-2.png') }}"> </div>
            <div class="col-lg-6 text-center text-lg-left">
              <h2 class="text-9 font-weight-600 text-light my-4">Download Our PayONEHub<br class="d-none d-lg-inline-block">
                Mobile App Now</h2>
              <p class="lead text-light">Download our app for the fastest, most convenient way to Recharge & Bill Payment, Booking and more....</p>
              <div class="pt-3"><a href="#" class="mr-4 btn btn-outline-light"><i class="fab fa-apple mr-1"></i> App Store</a> <a href="#" class="mr-4 btn btn-outline-light"><i class="fab fa-android mr-1"></i> Play Store</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mobile App end --> 
    
  </div>
  <!-- Content end --> 
  
   <!-- Banner
    ============================================= -->
    <div class="bg-light shadow-md pt-5 pb-4">
      <div class="container">
     
        <div class="owl-carousel owl-theme banner">
          <div class="item"><a href="#"><img class="img-fluid rounded" src="{{ asset('assets/front/images/slider/small-banner-1.jpg') }}" alt="banner" /></a></div>
          <div class="item"><a href="#"><img class="img-fluid rounded" src="{{ asset('assets/front/images/slider/small-banner-2.jpg') }}" alt="banner" /></a></div>
          <div class="item"><a href="#"><img class="img-fluid rounded" src="{{ asset('assets/front/images/slider/small-banner-3.jpg') }}" alt="banner" /></a></div>
          <div class="item"><a href="#"><img class="img-fluid rounded" src="{{ asset('assets/front/images/slider/small-banner-6.jpg') }}" alt="banner" /></a></div>
        </div>
      </div>
    </div><!-- Banner end -->
  
  <div class="section bg-white shadow-md ">
      <div class="container">
        <h2 class="text-9 font-weight-500 text-center mb-4">Our Partners</h2>
        <ul class="nav nav-tabs justify-content-xl-center" id="myPartners" role="tablist">
          <li class="nav-item"> <a class="nav-link active" id="operator-one-tab" data-toggle="tab" href="#operator-one" role="tab" aria-controls="operator-one" aria-selected="true">Recharge &amp; Bill</a> </li>
          <li class="nav-item"> <a class="nav-link" id="operator-two-tab" data-toggle="tab" href="#operator-two" role="tab" aria-controls="operator-two" aria-selected="false">Broadband / Landline Operator</a> </li>
          <li class="nav-item"> <a class="nav-link" id="operator-three-tab" data-toggle="tab" href="#operator-three" role="tab" aria-controls="operator-three" aria-selected="false">DTH</a> </li>
          <li class="nav-item"> <a class="nav-link" id="operator-four-tab" data-toggle="tab" href="#operator-four" role="tab" aria-controls="operator-four" aria-selected="false">Metro</a> </li>
          <li class="nav-item"> <a class="nav-link" id="operator-five-tab" data-toggle="tab" href="#operator-five" role="tab" aria-controls="operator-five" aria-selected="false">Gas</a> </li>
        </ul>
        <div class="tab-content mt-4" id="myPartnersContent">
          <div class="tab-pane fade active show" id="operator-one" role="tabpanel" aria-labelledby="operator-one-tab">
            <div class="brands-grid">
              <div class="row">
                <div class="col-4 col-sm-3 col-md-2 col-lg text-center"> <a href=""> <img class="img-fluid border rounded-circle" src="{{ asset('assets/front/images/brands/operator/airtel.png') }}" alt="Brands"> <span class="d-block">Airtel</span> </a> </div>
                <div class="col-4 col-sm-3 col-md-2 col-lg text-center"><a href=""><img class="img-fluid border rounded-circle" src="{{ asset('assets/front/images/brands/operator/vodafone.png') }}" alt="Brands"><span class="d-block">Vodafone</span></a></div>
                <div class="col-4 col-sm-3 col-md-2 col-lg text-center"><a href=""><img class="img-fluid border rounded-circle" src="{{ asset('assets/front/images/brands/operator/mtnl.png') }}" alt="Brands"><span class="d-block">MTNL</span></a></div>
                <div class="col-4 col-sm-3 col-md-2 col-lg text-center"><a href=""><img class="img-fluid border rounded-circle" src="{{ asset('assets/front/images/brands/operator/bsnl.png') }}" alt="Brands"><span class="d-block">BSNL</span></a></div>
                <div class="col-4 col-sm-3 col-md-2 col-lg text-center"><a href=""><img class="img-fluid border rounded-circle" src="{{ asset('assets/front/images/brands/operator/jio.png') }}" alt="Brands"><span class="d-block">Jio</span></a></div>
                
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="operator-two" role="tabpanel" aria-labelledby="operator-two-tab">
            <div class="brands-grid">
              <div class="row">
              <div class="fy3h">
   <div class="_1O3W">
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644391837100.png" role="presentation" height="42" width="42" alt="ACT Broadband Bill Payment" title="ACT Broadband Bill Payment"></div>
               <!-- react-text: 899 -->ACT Broadband<!-- /react-text --><!-- react-text: 900 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1552397146805.png" role="presentation" height="42" width="42" alt="ANI Network Bill Payment" title="ANI Network Bill Payment"></div>
               <!-- react-text: 905 -->ANI Network<!-- /react-text --><!-- react-text: 906 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644935757732.png" role="presentation" height="42" width="42" alt="Activline Bill Payment" title="Activline Bill Payment"></div>
               <!-- react-text: 911 -->Activline<!-- /react-text --><!-- react-text: 912 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644411417872.png" role="presentation" height="42" width="42" alt="Air Connect Bill Payment" title="Air Connect Bill Payment"></div>
               <!-- react-text: 917 -->Air Connect<!-- /react-text --><!-- react-text: 918 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644935704753.png" role="presentation" height="42" width="42" alt="AirJaldi - Rural Broadband Bill Payment" title="AirJaldi - Rural Broadband Bill Payment"></div>
               <!-- react-text: 923 -->AirJaldi - Rural Broadband<!-- /react-text --><!-- react-text: 924 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644409460661.png" role="presentation" height="42" width="42" alt="Airtel Bill Payment" title="Airtel Bill Payment"></div>
               <!-- react-text: 929 -->Airtel<!-- /react-text --><!-- react-text: 930 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644461312543.png" role="presentation" height="42" width="42" alt="Alliance Broadband Bill Payment" title="Alliance Broadband Bill Payment"></div>
               <!-- react-text: 935 -->Alliance Broadband<!-- /react-text --><!-- react-text: 936 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="eAlB" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644411586155.png" role="presentation" height="42" width="42" alt="Apple Fibernet Bill Payment" title="Apple Fibernet Bill Payment"></div>
               <!-- react-text: 942 -->Apple Fibernet<!-- /react-text --><!-- react-text: 943 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644409886430.png" role="presentation" height="42" width="42" alt="Asianet Broadband Bill Payment" title="Asianet Broadband Bill Payment"></div>
               <!-- react-text: 948 -->Asianet Broadband<!-- /react-text --><!-- react-text: 949 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644935871928.png" role="presentation" height="42" width="42" alt="BSNL Bill Payment" title="BSNL Bill Payment"></div>
               <!-- react-text: 954 -->BSNL<!-- /react-text --><!-- react-text: 955 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644462622653.png" role="presentation" height="42" width="42" alt="BSNL Landline Corporate Bill Payment" title="BSNL Landline Corporate Bill Payment"></div>
               <!-- react-text: 960 -->BSNL Landline Corporate<!-- /react-text --><!-- react-text: 961 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644462269218.png" role="presentation" height="42" width="42" alt="Clicknet Communication Bill Payment" title="Clicknet Communication Bill Payment"></div>
               <!-- react-text: 966 -->Clicknet Communication<!-- /react-text --><!-- react-text: 967 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644391340938.png" role="presentation" height="42" width="42" alt="Comway Broadband Bill Payment" title="Comway Broadband Bill Payment"></div>
               <!-- react-text: 972 -->Comway Broadband<!-- /react-text --><!-- react-text: 973 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644410782670.png" role="presentation" height="42" width="42" alt="Connect Broadband Bill Payment" title="Connect Broadband Bill Payment"></div>
               <!-- react-text: 978 -->Connect Broadband<!-- /react-text --><!-- react-text: 979 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644410614849.png" role="presentation" height="42" width="42" alt="DWAN Supports Private Ltd Bill Payment" title="DWAN Supports Private Ltd Bill Payment"></div>
               <!-- react-text: 985 -->DWAN Supports Private Ltd<!-- /react-text --><!-- react-text: 986 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644415458592.png" role="presentation" height="42" width="42" alt="Den Broadband Bill Payment" title="Den Broadband Bill Payment"></div>
               <!-- react-text: 991 -->Den Broadband<!-- /react-text --><!-- react-text: 992 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644410144403.png" role="presentation" height="42" width="42" alt="Digiway Net Bill Payment" title="Digiway Net Bill Payment"></div>
               <!-- react-text: 997 -->Digiway Net<!-- /react-text --><!-- react-text: 998 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644460003865.png" role="presentation" height="42" width="42" alt="Dreamtel Broadband Bill Payment" title="Dreamtel Broadband Bill Payment"></div>
               <!-- react-text: 1003 -->Dreamtel Broadband<!-- /react-text --><!-- react-text: 1004 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644395781381.png" role="presentation" height="42" width="42" alt="EthernetXpress Bill Payment" title="EthernetXpress Bill Payment"></div>
               <!-- react-text: 1009 -->EthernetXpress<!-- /react-text --><!-- react-text: 1010 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644855932328.png" role="presentation" height="42" width="42" alt="Excell Broadband Bill Payment" title="Excell Broadband Bill Payment"></div>
               <!-- react-text: 1015 -->Excell Broadband<!-- /react-text --><!-- react-text: 1016 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644395437611.png" role="presentation" height="42" width="42" alt="Ficus Telecom Pvt Ltd Bill Payment" title="Ficus Telecom Pvt Ltd Bill Payment"></div>
               <!-- react-text: 1021 -->Ficus Telecom Pvt Ltd<!-- /react-text --><!-- react-text: 1022 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644461543563.png" role="presentation" height="42" width="42" alt="Flash Fibernet Bill Payment" title="Flash Fibernet Bill Payment"></div>
               <!-- react-text: 1028 -->Flash Fibernet<!-- /react-text --><!-- react-text: 1029 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644460360173.png" role="presentation" height="42" width="42" alt="Foxtel Broadband Bill Payment" title="Foxtel Broadband Bill Payment"></div>
               <!-- react-text: 1034 -->Foxtel Broadband<!-- /react-text --><!-- react-text: 1035 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644459734491.png" role="presentation" height="42" width="42" alt="Fusionnet Web Services Private Limited Bill Payment" title="Fusionnet Web Services Private Limited Bill Payment"></div>
               <!-- react-text: 1040 -->Fusionnet Web Services Private Limited<!-- /react-text --><!-- react-text: 1041 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644855663131.png" role="presentation" height="42" width="42" alt="GBPS Broadband Bill Payment" title="GBPS Broadband Bill Payment"></div>
               <!-- react-text: 1046 -->GBPS Broadband<!-- /react-text --><!-- react-text: 1047 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644395225405.png" role="presentation" height="42" width="42" alt="GIGANTIC Broadband Bill Payment" title="GIGANTIC Broadband Bill Payment"></div>
               <!-- react-text: 1052 -->GIGANTIC Broadband<!-- /react-text --><!-- react-text: 1053 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644460719424.png" role="presentation" height="42" width="42" alt="GTPL Broadband Bill Payment" title="GTPL Broadband Bill Payment"></div>
               <!-- react-text: 1058 -->GTPL Broadband<!-- /react-text --><!-- react-text: 1059 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644859255391.png" role="presentation" height="42" width="42" alt="GTPL KCBPL Broadband Pvt Ltd Bill Payment" title="GTPL KCBPL Broadband Pvt Ltd Bill Payment"></div>
               <!-- react-text: 1064 -->GTPL KCBPL Broadband Pvt Ltd<!-- /react-text --><!-- react-text: 1065 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644397859950.png" role="presentation" height="42" width="42" alt="HBS Network Bill Payment" title="HBS Network Bill Payment"></div>
               <!-- react-text: 1071 -->HBS Network<!-- /react-text --><!-- react-text: 1072 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644393556965.png" role="presentation" height="42" width="42" alt="Hathway Broadband Bill Payment" title="Hathway Broadband Bill Payment"></div>
               <!-- react-text: 1077 -->Hathway Broadband<!-- /react-text --><!-- react-text: 1078 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644408865818.png" role="presentation" height="42" width="42" alt="INSTALINKS Bill Payment" title="INSTALINKS Bill Payment"></div>
               <!-- react-text: 1083 -->INSTALINKS<!-- /react-text --><!-- react-text: 1084 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644397360041.png" role="presentation" height="42" width="42" alt="ION Bill Payment" title="ION Bill Payment"></div>
               <!-- react-text: 1089 -->ION<!-- /react-text --><!-- react-text: 1090 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644855847495.png" role="presentation" height="42" width="42" alt="Instanet Broadband Bill Payment" title="Instanet Broadband Bill Payment"></div>
               <!-- react-text: 1095 -->Instanet Broadband<!-- /react-text --><!-- react-text: 1096 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644461718426.png" role="presentation" height="42" width="42" alt="Ishan Netsol Bill Payment" title="Ishan Netsol Bill Payment"></div>
               <!-- react-text: 1101 -->Ishan Netsol<!-- /react-text --><!-- react-text: 1102 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644410381121.png" role="presentation" height="42" width="42" alt="Kerala Vision Broadband Pvt Ltd Bill Payment" title="Kerala Vision Broadband Pvt Ltd Bill Payment"></div>
               <!-- react-text: 1107 -->Kerala Vision Broadband Pvt Ltd<!-- /react-text --><!-- react-text: 1108 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644411196864.png" role="presentation" height="42" width="42" alt="Kings Broadband Bill Payment" title="Kings Broadband Bill Payment"></div>
               <!-- react-text: 1114 -->Kings Broadband<!-- /react-text --><!-- react-text: 1115 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644856153253.png" role="presentation" height="42" width="42" alt="Limras Eronet Bill Payment" title="Limras Eronet Bill Payment"></div>
               <!-- react-text: 1120 -->Limras Eronet<!-- /react-text --><!-- react-text: 1121 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644400439331.png" role="presentation" height="42" width="42" alt="Linkio Bill Payment" title="Linkio Bill Payment"></div>
               <!-- react-text: 1126 -->Linkio<!-- /react-text --><!-- react-text: 1127 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644396713271.png" role="presentation" height="42" width="42" alt="MTNL Delhi Bill Payment" title="MTNL Delhi Bill Payment"></div>
               <!-- react-text: 1132 -->MTNL Delhi<!-- /react-text --><!-- react-text: 1133 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644417021864.png" role="presentation" height="42" width="42" alt="MTNL Mumbai Bill Payment" title="MTNL Mumbai Bill Payment"></div>
               <!-- react-text: 1138 -->MTNL Mumbai<!-- /react-text --><!-- react-text: 1139 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1553499929244.png" role="presentation" height="42" width="42" alt="Mach1 Broadband Bill Payment" title="Mach1 Broadband Bill Payment"></div>
               <!-- react-text: 1144 -->Mach1 Broadband<!-- /react-text --><!-- react-text: 1145 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644460541506.png" role="presentation" height="42" width="42" alt="Meghbela Bill Payment" title="Meghbela Bill Payment"></div>
               <!-- react-text: 1150 -->Meghbela<!-- /react-text --><!-- react-text: 1151 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644935820102.png" role="presentation" height="42" width="42" alt="Microscan Bill Payment" title="Microscan Bill Payment"></div>
               <!-- react-text: 1157 -->Microscan<!-- /react-text --><!-- react-text: 1158 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644854869550.png" role="presentation" height="42" width="42" alt="Mnet Broadband Bill Payment" title="Mnet Broadband Bill Payment"></div>
               <!-- react-text: 1163 -->Mnet Broadband<!-- /react-text --><!-- react-text: 1164 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644410963711.png" role="presentation" height="42" width="42" alt="NSB Networks Broadband Bill Payment" title="NSB Networks Broadband Bill Payment"></div>
               <!-- react-text: 1169 -->NSB Networks Broadband<!-- /react-text --><!-- react-text: 1170 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644400708878.png" role="presentation" height="42" width="42" alt="Netplus Broadband Bill Payment" title="Netplus Broadband Bill Payment"></div>
               <!-- react-text: 1175 -->Netplus Broadband<!-- /react-text --><!-- react-text: 1176 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644398211737.png" role="presentation" height="42" width="42" alt="Nextra Broadband Bill Payment" title="Nextra Broadband Bill Payment"></div>
               <!-- react-text: 1181 -->Nextra Broadband<!-- /react-text --><!-- react-text: 1182 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1554712578842.png" role="presentation" height="42" width="42" alt="ONE Broadband Bill Payment" title="ONE Broadband Bill Payment"></div>
               <!-- react-text: 1187 -->ONE Broadband<!-- /react-text --><!-- react-text: 1188 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644506744682.png" role="presentation" height="42" width="42" alt="Paynet Digital Network Private Limited Bill Payment" title="Paynet Digital Network Private Limited Bill Payment"></div>
               <!-- react-text: 1193 -->Paynet Digital Network Private Limited<!-- /react-text --><!-- react-text: 1194 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644869186433.png" role="presentation" height="42" width="42" alt="Pink Broadband Bill Payment" title="Pink Broadband Bill Payment"></div>
               <!-- react-text: 1200 -->Pink Broadband<!-- /react-text --><!-- react-text: 1201 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644411751102.png" role="presentation" height="42" width="42" alt="Praction Network Bill Payment" title="Praction Network Bill Payment"></div>
               <!-- react-text: 1206 -->Praction Network<!-- /react-text --><!-- react-text: 1207 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1548844057362.png" role="presentation" height="42" width="42" alt="SPECTRA Bill Payment" title="SPECTRA Bill Payment"></div>
               <!-- react-text: 1212 -->SPECTRA<!-- /react-text --><!-- react-text: 1213 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1551960511657.png" role="presentation" height="42" width="42" alt="Sikka Broadband Bill Payment" title="Sikka Broadband Bill Payment"></div>
               <!-- react-text: 1218 -->Sikka Broadband<!-- /react-text --><!-- react-text: 1219 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1548843962580.png" role="presentation" height="42" width="42" alt="Siti Broadband Bill Payment" title="Siti Broadband Bill Payment"></div>
               <!-- react-text: 1224 -->Siti Broadband<!-- /react-text --><!-- react-text: 1225 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644415114960.png" role="presentation" height="42" width="42" alt="Swift Net Broadband Bill Payment" title="Swift Net Broadband Bill Payment"></div>
               <!-- react-text: 1230 -->Swift Net Broadband<!-- /react-text --><!-- react-text: 1231 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644856076691.png" role="presentation" height="42" width="42" alt="Swifttele Enterprises Private Limited Bill Payment" title="Swifttele Enterprises Private Limited Bill Payment"></div>
               <!-- react-text: 1236 -->Swifttele Enterprises Private Limited<!-- /react-text --><!-- react-text: 1237 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644856307799.png" role="presentation" height="42" width="42" alt="TIC FIBER Bill Payment" title="TIC FIBER Bill Payment"></div>
               <!-- react-text: 1243 -->TIC FIBER<!-- /react-text --><!-- react-text: 1244 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644859501013.png" role="presentation" height="42" width="42" alt="TTN Broadband Bill Payment" title="TTN Broadband Bill Payment"></div>
               <!-- react-text: 1249 -->TTN Broadband<!-- /react-text --><!-- react-text: 1250 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1643212352550.png" role="presentation" height="42" width="42" alt="Tata Play Fiber Bill Payment" title="Tata Play Fiber Bill Payment"></div>
               <!-- react-text: 1255 -->Tata Play Fiber<!-- /react-text --><!-- react-text: 1256 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644397628415.png" role="presentation" height="42" width="42" alt="Tata Tele Broadband Bill Payment" title="Tata Tele Broadband Bill Payment"></div>
               <!-- react-text: 1261 -->Tata Tele Broadband<!-- /react-text --><!-- react-text: 1262 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644856464850.png" role="presentation" height="42" width="42" alt="Telosy Broadband Bill Payment" title="Telosy Broadband Bill Payment"></div>
               <!-- react-text: 1267 -->Telosy Broadband<!-- /react-text --><!-- react-text: 1268 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644394616034.png" role="presentation" height="42" width="42" alt="Tikona Broadband Bill Payment" title="Tikona Broadband Bill Payment"></div>
               <!-- react-text: 1273 -->Tikona Broadband<!-- /react-text --><!-- react-text: 1274 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644394281739.png" role="presentation" height="42" width="42" alt="Timbl Broadband Bill Payment" title="Timbl Broadband Bill Payment"></div>
               <!-- react-text: 1279 -->Timbl Broadband<!-- /react-text --><!-- react-text: 1280 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
      <ul>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644396931078.png" role="presentation" height="42" width="42" alt="UCN Broadband Bill Payment" title="UCN Broadband Bill Payment"></div>
               <!-- react-text: 1286 -->UCN Broadband<!-- /react-text --><!-- react-text: 1287 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1645107452897.png" role="presentation" height="42" width="42" alt="Vfibernet Broadband Bill Payment" title="Vfibernet Broadband Bill Payment"></div>
               <!-- react-text: 1292 -->Vfibernet Broadband<!-- /react-text --><!-- react-text: 1293 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644856382547.png" role="presentation" height="42" width="42" alt="Wibro Broadband Bill Payment" title="Wibro Broadband Bill Payment"></div>
               <!-- react-text: 1298 -->Wibro Broadband<!-- /react-text --><!-- react-text: 1299 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644856013577.png" role="presentation" height="42" width="42" alt="Wish Net Bill Payment" title="Wish Net Bill Payment"></div>
               <!-- react-text: 1304 -->Wish Net<!-- /react-text --><!-- react-text: 1305 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
         <li class="_19rm">
            <a class="" href="#" method="push">
               <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1535538371075.png" role="presentation" height="42" width="42" alt="YOU Broadband Bill Payment" title="YOU Broadband Bill Payment"></div>
               <!-- react-text: 1310 -->YOU Broadband<!-- /react-text --><!-- react-text: 1311 --> Bill Payment<!-- /react-text -->
            </a>
         </li>
      </ul>
   </div>
</div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="operator-three" role="tabpanel" aria-labelledby="operator-three-tab">
            <div class="brands-grid">
              <div class="row">
              
              <div class="fy3h">
   <div class="_1O3W">
   
   <ul>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1642177514124.png" role="presentation" height="42" width="42" alt="Airtel Digital TV Recharge" title="Airtel Digital TV Recharge"></div>
         <!-- react-text: 195 -->Airtel Digital TV<!-- /react-text --><!-- react-text: 196 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1642177898844.png" role="presentation" height="42" width="42" alt="Dish TV Recharge" title="Dish TV Recharge"></div>
         <!-- react-text: 201 -->Dish TV<!-- /react-text --><!-- react-text: 202 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1642177750172.png" role="presentation" height="42" width="42" alt="Sun Direct Recharge" title="Sun Direct Recharge"></div>
         <!-- react-text: 207 -->Sun Direct<!-- /react-text --><!-- react-text: 208 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1644420357192.png" role="presentation" height="42" width="42" alt="Tata Play Recharge" title="Tata Play Recharge"></div>
         <!-- react-text: 213 -->Tata Play<!-- /react-text --><!-- react-text: 214 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1642177421402.png" role="presentation" height="42" width="42" alt="d2h Recharge" title="d2h Recharge"></div>
         <!-- react-text: 219 -->d2h<!-- /react-text --><!-- react-text: 220 --> Recharge<!-- /react-text -->
      </a>
   </li>
</ul>
   </div>
   
   </div>
               
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="operator-four" role="tabpanel" aria-labelledby="operator-four-tab">
            <div class="brands-grid">
              <div class="row">
                <div class="fy3h">
   <div class="_1O3W">
   
   <ul>
   <li>
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1609999807999.jpeg" role="presentation" height="42" width="42" alt="Bengaluru Metro Recharge" title="Bengaluru Metro Recharge"></div>
         <!-- react-text: 894 -->Bengaluru Metro<!-- /react-text --><!-- react-text: 895 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li>
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1564040109339.png" role="presentation" height="42" width="42" alt="Delhi Metro Recharge" title="Delhi Metro Recharge"></div>
         <!-- react-text: 900 -->Delhi Metro<!-- /react-text --><!-- react-text: 901 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li>
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1564040144453.png" role="presentation" height="42" width="42" alt="Hyderabad Metro Recharge" title="Hyderabad Metro Recharge"></div>
         <!-- react-text: 906 -->Hyderabad Metro<!-- /react-text --><!-- react-text: 907 --> Recharge<!-- /react-text -->
      </a>
   </li>
   <li>
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1564040078583.png" role="presentation" height="42" width="42" alt="Mumbai Metro Recharge" title="Mumbai Metro Recharge"></div>
         <!-- react-text: 912 -->Mumbai Metro<!-- /react-text --><!-- react-text: 913 --> Recharge<!-- /react-text -->
      </a>
   </li>
</ul>
   </div>
   
   </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="operator-five" role="tabpanel" aria-labelledby="operator-five-tab">
            <div class="brands-grid">
              <div class="row">
                <div class="fy3h">
   <div class="_1O3W">
   
   <ul>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1623661674309.png" role="presentation" height="42" width="42" alt="Bharatgas Bill Payment" title="Bharatgas Bill Payment"></div>
         <!-- react-text: 200 -->Bharatgas<!-- /react-text --><!-- react-text: 201 --> Bill Payment<!-- /react-text -->
      </a>
   </li>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1623661865528.png" role="presentation" height="42" width="42" alt="HP Gas Bill Payment" title="HP Gas Bill Payment"></div>
         <!-- react-text: 206 -->HP Gas<!-- /react-text --><!-- react-text: 207 --> Bill Payment<!-- /react-text -->
      </a>
   </li>
   <li class="_19rm">
      <a class="" href="#" method="push">
         <div><img src="https://assetscdn1.paytm.com/images/catalog/operators/84x84/1623661718714.png" role="presentation" height="42" width="42" alt="Indane Bill Payment" title="Indane Bill Payment"></div>
         <!-- react-text: 212 -->Indane<!-- /react-text --><!-- react-text: 213 --> Bill Payment<!-- /react-text -->
      </a>
   </li>
</ul>
   </div>
   
   </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
