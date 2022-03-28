<!DOCTYPE html>
<html lang="en">
<!-- start head Area -->
@include('layouts/front/element/head')
<!-- end head Area -->
<body>
<!-- Preloader -->
<div id="preloader"><div data-loader="dual-ring"></div></div><!-- Preloader End -->
	<!-- start header Area -->
    @include('layouts/front/element/header')
	<!-- end header Area -->
	
    @yield('content')
    
    <!-- start footer Area -->
	@include('layouts/front/element/footer') 
    <!-- End footer Area -->
	@include('layouts/front/element/model')
	
	@include('layouts/front/element/script')
</body>

</html>