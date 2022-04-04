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
    $('#signupForm').submit(function(event) { //Trigger on form submit
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
				$('.throw_success').fadeIn(1000).append('<p>' + data.message + '</p>'); //If successful, than throw a success message
				setTimeout(function() {
					location.reload();
				}, 5000);
			},
			error:function (response){
				$.each(response.responseJSON.errors,function(field_name,error){
					$('.throw_error').fadeIn(1000).append('<p>' +error+ '</p>');
				});
			},
        });
        event.preventDefault(); //Prevent the default submit
    });
});


</script>