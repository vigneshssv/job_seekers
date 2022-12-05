$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".session_messages").alert('close');
    }, 3000);

    $('.numberonly').keypress(function (e) {    

        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    });
});
 $(function() {
            $('.date-picker-year').datepicker({
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                onClose: function(dateText, inst) { 
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1));
                }
            });
        $(".date-picker-year").focus(function () {
                $(".ui-datepicker-month").hide();
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
	console.log(url);
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

function cancel_forms() {
	alert();
	window.location = base_url()+'/admin/job_seekers';
}