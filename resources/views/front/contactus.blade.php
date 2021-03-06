@extends('layouts.front.default')
@section('content')

<!-- Web Fonts
============================================= -->
    <div class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Contact Us</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.html">Home</a></li>
              <li class="active">Contact Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- Secondary Navigation end -->
    <div id="content">    
	  <div class="container">
        <div class="row">
        <div class="col-md-6">
          <div class="bg-light shadow-md rounded h-100 p-3">
           
 <div class="form-box">
  <h1>Contact Form</h1>
  <form class="form-horizontal form-material" action="{{url('admin/save-contactus')}}" method="post" id="contactus" enctype="multipart/form-data">@csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" id="name" type="text" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" id="email" type="text" name="email">
    </div>
    <div class="form-group">
      <label for="email">Mobile</label>
      <input class="form-control" id="email" type="text" name="mobile">
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="form-control" id="message" name="message"></textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="Submit" />
 
  </form>
   </div>
     </div>
       </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="bg-light shadow-md rounded p-4">
            <h2 class="text-6">Get in touch</h2>
            <p class="text-3">For Customer Support and Query, Get in touch with us: <a href="#">Help</a></p>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-map-marker-alt"></i></div>
              <h3>Quickai Inc.</h3>
              <p>1 st floor Aruna 55 ATT colony near Central RTO office<br> coimbatore-641018 </p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-phone"></i> </div>
              <h3>Telephone</h3>
              <p>+91 9092407431</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-envelope"></i> </div>
              <h3>Business Inquiries</h3>
              <p>payonehub@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
  
 @endsection
 <script>
         $('#contactus').validate({ 
            ignore: ".ignore",
            rules: {
                name: {
                    required: true
                },
                email: {
                  required: true,
                },
                mobile: {
                    required: true
                },
            },
            messages: {
                name: "Enter the Name",
                email: "Enter the Email",
                mobile: "Enter the Mobile",
                
            }
        });
    </script>

