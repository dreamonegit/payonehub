<!-- Script --> 
<script src="{{ asset('assets/front/vendor/jquery/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
<script src="{{ asset('assets/front/vendor/owl.carousel/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('assets/front/vendor/daterangepicker/moment.min.js') }}"></script> 
<script src="{{ asset('assets/front/vendor/daterangepicker/daterangepicker.js') }}"></script> 
<script src="{{ asset('assets/front/js/theme.js') }}"></script>
<script src="{{ asset('assets/front/vendor/font-awesome/js/all.min.js') }}"></script> 

<script>
$(function() {
 'use strict';
  // Depart Date
  $('#birthDate').daterangepicker({
	singleDatePicker: true,
	"showDropdowns": true,
	autoUpdateInput: false,
	maxDate: moment().add(0, 'days'),
	}, function(chosen_date) {
	  $('#birthDate').val(chosen_date.format('MM-DD-YYYY'));
	  });
  });
$(document).ready(function() {
	
    $('#loginForm').submit(function(event) { //Trigger on form submit
		$('#login-action').prop('disabled', true).html('wait....');
        $('.throw_log_error').empty(); //Clear the messages first
        $('.throw_log_success').empty();
        var postForm = { //Fetch form data
			"_token"	: "{{ csrf_token() }}",
			'username'		: $('input[name=username]').val(),
            'password'    : $('input[name=logpassword]').val()
        };
        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : '{{ url("/signin") }}', //Your form processing file URL
            data      : postForm, //Forms name
            dataType  : 'json',
            success   : function(data) {
				$('#login-action').prop('disabled', false).html('Login');
				$('.throw_log_success').fadeIn(1000).append('<p>' + data.message + '</p>'); //If successful, than throw a success message
				setTimeout(function() {
					location.reload();
				}, 3000);
			},
			error:function (response){
				$.each(response.responseJSON.errors,function(field_name,error){
					$('.throw_log_error').fadeIn(1000).append('<p>' +error+ '</p>');
				});
				$('#login-action').prop('disabled', false).html('Login');
			},
        });
        event.preventDefault(); //Prevent the default submit
    });
	
    $('#signupForm').submit(function(event) { //Trigger on form submit
		$('#signup-action').prop('disabled', true).html('Wait....');
        $('.throw_error').empty(); //Clear the messages first
        $('.throw_success').empty();
        var postForm = { //Fetch form data
			"_token"	: "{{ csrf_token() }}",
			'name'		: $('input[name=name]').val(),
            'mobile'    : $('input[name=mobile]').val(),
			'email'     : $('input[name=email]').val(),
			'password'  : $('input[name=password]').val()
        };
        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : '{{ url("/signup") }}', //Your form processing file URL
            data      : postForm, //Forms name
            dataType  : 'json',
            success   : function(data) {
				$('#signup-action').prop('disabled', false).html('Signup');
				$('.throw_success').fadeIn(1000).append('<p>' + data.message + '</p>'); //If successful, than throw a success message
				setTimeout(function() {
					location.reload();
				}, 3000);
			},
			error:function (response){
				$('#signup-action').prop('disabled', false).html('Signup');
				$.each(response.responseJSON.errors,function(field_name,error){
					$('.throw_error').fadeIn(1000).append('<p>' +error+ '</p>');
				});
			},
        });
        event.preventDefault(); //Prevent the default submit
    });
	 $('#forgotForm').submit(function(event) { //Trigger on form submit
			$('#forgot-action').prop('disabled', true).html('wait....');
			$('.throw_error').empty(); //Clear the messages first
			$('.throw_success').empty();
			var postForm = { //Fetch form data
				"_token"	: "{{ csrf_token() }}",
				'email'		: $('input[name=forgotmail]').val()
			};
			$.ajax({ //Process the form using $.ajax()
				type      : 'POST', //Method type
				url       : '{{ url("/forgotpassword") }}', //Your form processing file URL
				data      : postForm, //Forms name
				dataType  : 'json',
				success   : function(data) {
					$('#forgot-action').prop('disabled', false).html('Send Password to Mail');
					$('.throw_success').fadeIn(1000).append('<p>' + data.message + '</p>'); //If successful, than throw a success message
					setTimeout(function() {
						location.reload();
					}, 3000);
				},
				error:function (response){
					$.each(response.responseJSON.errors,function(field_name,error){
						$('.throw_error').fadeIn(1000).append('<p>' +error+ '</p>');
					});
					$('#forgot-action').prop('disabled', false).html('Send Password to Mail');
				},
			});
			event.preventDefault(); //Prevent the default submit
	 });
});
$(document).on('click','#forgot',function(){
	$('.close').trigger('click');
	$('#login-forgot').addClass('show').fadeIn(500);
	$('#forgot-content').addClass('show').addClass('active');
});
$(document).on('click','.close',function(){
	$('#login-forgot').removeClass('show').css('display','none').fadeOut(500);
	$('#forgot-content').removeClass('show').removeClass('active');
});


$(document).on('click','.toggle-password',function(){
	
    $(this).toggleClass("fa-eye ");

	const type = $('#loginPassword').attr('type') === 'password' ? 'text' : 'password';
    $('#loginPassword').attr('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>