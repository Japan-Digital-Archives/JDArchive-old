/* Javascript(JQuery) for new landing page (Zeega alpha)
 * Mar 6, 2012
 * Handles AJAX form submission
 * Could definitely be more efficient, but this was quick
 */
 
 // form submission
 $(document).ready(function(){
	$("#register-form").validate({
		debug: false,
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			}
		},
		// override default error display behavior
		errorPlacement: function(error, element) {},
		highlight: function(element, errorClass) {
	     	$(element).addClass(errorClass);
	  	},
	  	unhighlight: function(element, errorClass) {
	     	$(element).removeClass(errorClass);
	  	},
		submitHandler: function(form) {
			var message = ($('#lang').html() == 'English') ? '少々お待ちください' : 'Registering...';
			$('#results').css("color", "#339BB9");
			$('#results').html(message); 
			// send valid form to be put on the google spreadsheet
			 $.post('process.php', $("#register-form").serialize(), function(data) {
			 	$('#results').css("color", "#404040");
                $('#results').html(data);
             }
	    	);
		}
	});
 
});

