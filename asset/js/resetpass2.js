$(function(){
	var $loginForm = $("#verify");

	$.validator.addMethod("noSpace", function(value, element){
		return value == '' || value.trim().length != 0
	}, "Spaces are not allowed!");
	
	$.validator.addMethod("usernamevalues", function (value, element){
		return this.optional(element) || /^[a-zA-Z0-9\.\_\@\s]+$/i.test(value);
	}, "Must consist of alphabetical, numeric, dot, @ and underscore only!");

	if ($loginForm.length) {
		$loginForm.validate({
			rules:{
				password:{
					required: true,
					minlength: 5
				},
				confirm_password:{
					required: true,
					minlength: 5,
					equalTo: '#passWord'
				}
			},
			messages:{
				password: {
					required: 'Please enter password!',
					minlength: 'Password must be more than 5 characters!'
				},
				confirm_password: {
					required: 'Please confirm password!',
					equalTo: 'Passwords does not match!',
					minlength: 'Confirm password must be more than 5 characters!'
				}
			},
			errorPlacement: function(error, element){
				error.appendTo(element.parents(".validate"));
			}
		})
	}
})