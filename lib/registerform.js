$(document).ready(function(){
		$("form#register-form").validate({
			debug: false,
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				name: "Please let us know who you are.",
				email: "Please enter a valid email.",
			},
			submitHandler: function(form) {
				// do other stuff for a valid form
				$.post('process.php', $("form#register-form").serialize(), function(data) {
					$('#results').html(data);
				});
			}
		});
	});
