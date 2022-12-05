$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".session_messages").alert('close');
    }, 3000);
    $('.select2').select2();
    $('.select-multiple').select2({
    	tags:true,
    	tokenSeparators:[",", ""],
    });
    $('.numberonly').keypress(function (e) {    

        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    });

    $('.yearpicker').datepicker({
		  minViewMode: 2,
         format: 'yyyy',

	    
	}).on('changeDate', function(e){
	    $('.datepicker').hide();
	});
});

function base_url() {
	return $('.base_url').val();
}

function validate_login_form() {
var url = base_url()+'/admin/validate-login-form';

	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: $('.login_form').serialize(),
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.login_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}

function validate_registration_form() {
	var url = base_url()+'/admin/validate-registration-form';
	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: $('.registration_form').serialize(),
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.registration_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}

function onlyNumbers(val, evt) {
	evt = evt ? evt : window.event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode); 
	if ((charCode < 48) || (charCode > 57)) { 
		return false; 
	}
	return true;
}

function onlyNumberPaste(input) {
	let value = input.value;
	let numbers = value.replace(/[^0-9]/g, "");
	if(input.value === numbers) {
		input.value = numbers;
	} else {
		input.value = numbers.replace(/[^0-9]/g, "");
	}
}

function validate_job_seeker_registration_form() {
	var url = base_url()+'/job_seekers/validate-registration-form';
	var form = $('.registration_form')[0];
	var formData = new FormData(form);
	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: formData,
          cache: false,
          contentType: false,
          processData: false,
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.registration_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}

function cancel_forms() {
	window.location.href = base_url()+'/admin/job_seekers';
}

function validate_job_login_form() {
var url = base_url()+'/job_seekers/validate-login-form';

	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: $('.login_form').serialize(),
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.login_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}


function validate_change_password() {
	var url = base_url()+'/job_seekers/validate-change-password-form';

	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: $('.change_password_form').serialize(),
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.change_password_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}

function validate_profile_form() {
	var url = base_url()+'/job_seekers/validate-profile-form';
	var form = $('.profile_form')[0];
	var formData = new FormData(form);
	
	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: formData,
        cache: false,
        contentType: false,
        processData: false,
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.profile_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}