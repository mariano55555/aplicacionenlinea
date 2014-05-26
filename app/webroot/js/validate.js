$(document).ready(function() {
	var app = $('#content').attr('url');
	$('#name').blur(function() {
		/* Act on the event */
		$.post(
			app +'users/validate_form', 
			{field: $(this).attr('id'), value: $(this).val() },
			handleNameValidation
		);
	});
	$('#email').blur(function() {
		/* Act on the event */
		$.post(
			app +'users/validate_form', 
			{field: $(this).attr('id'), value: $(this).val() },
			handleEmailValidation
		);
	});
	$('#username').blur(function() {
		/* Act on the event */
		$.post(
			app +'users/validate_form', 
			{field: $(this).attr('id'), value: $(this).val() },
			handleUsernameValidation
		);
	});
	$('#password').blur(function() {
		/* Act on the event */
		$.post(
			app +'users/validate_form', 
			{field: $(this).attr('id'), value: $(this).val() },
			handlePasswordValidation
		);
	});
	$('#password_confirmation').blur(function() {
		/* Act on the event */
		$.post(
			app +'users/validate_pass', 
			{password_confirmation: $(this).val(),  password: $('#password').val() },
			handlePasswordConfirmationValidation
			//handlePasswordValidation
		);
	});


	function handleNameValidation(error) {
		if (error.length > 0) {
			if ($('#name-notEmpty').length == 0) 
			{
				$('#name').after('<div id="name-notEmpty">' + error + '</div>');
			}else{
				$('#name-notEmpty').remove();	
				$('#name').after('<div id="name-notEmpty">' + error + '</div>');
			}
		} else{
			$('#name-notEmpty').remove();
		}
	}
	function handlePasswordConfirmationValidation(error) {
		if (error.length > 0) {
			if ($('#password2-notEmpty').length == 0) 
			{
				$('#password_confirmation').after('<div id="password2-notEmpty">' + error + '</div>');
			}else{
				$('#password2-notEmpty').remove();	
				$('#password_confirmation').after('<div id="password2-notEmpty">' + error + '</div>');
			}
		} else{
			$('#password2-notEmpty').remove();
		}
	}
	function handlePasswordValidation(error) {
		if (error.length > 0) {
			if ($('#password-notEmpty').length == 0) 
			{
				$('#password').after('<div id="password-notEmpty">' + error + '</div>');
			}else{
				$('#password-notEmpty').remove();	
				$('#password').after('<div id="password-notEmpty">' + error + '</div>');
			}
		} else{
			$('#password-notEmpty').remove();
		}
	}
	function handleEmailValidation(error) {
		if (error.length > 0) {
			if ($('#email-notEmpty').length == 0) 
			{
				$('#email').after('<div id="email-notEmpty">' + error + '</div>');
			}else{
				$('#email-notEmpty').remove();
				$('#email').after('<div id="email-notEmpty">' + error + '</div>');
			}
		} else{
			$('#email-notEmpty').remove();
		}
	}
	function handleUsernameValidation(error) {
		if (error.length > 0) {
			if ($('#username-notEmpty').length == 0) 
			{
				$('#username').after('<div id="username-notEmpty">' + error + '</div>');
			}else{
				$('#username-notEmpty').remove();	
				$('#username').after('<div id="username-notEmpty">' + error + '</div>');
			}
		} else{
			$('#username-notEmpty').remove();
		}
	}
});