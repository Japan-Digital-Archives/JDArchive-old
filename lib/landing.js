/* Javascript(JQuery) for new landing page (Zeega alpha)
 * Mar 6, 2012
 * Enables reloading of languages on launch page by clicking language div
 * Also handles AJAX form submission
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
 
	 // change to English
	$('#lang').click(function() {
		if ($(this).html() == 'English') {
		
			// change title
		    $('#title').html('<img src="lib/images/header-en.png">');
			
			// change language bar
			$(this).html('日本語');
			
			// change text in register header
			$('#register-header').html('Register to use our archive prototype:');
			
			// change archive links
			$("#archi-links").html( 
			'<ul>\
				<li id="l1"><a href="../explore/?la=en">\
					<div class="btn shadow archi">About the Archive</div>\
				</a></li>\
				<li id="l2"><a href="../seeds/?la=en">\
					<div class="btn shadow archi">Search the Website Archive</div>\
				</a></li>\
				<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">\
					<div class="btn shadow archi">Browse our Map Layers</div>\
				</a></li>\
				<li id="l4"><a href="../featured/?la=en">\
					<div class="btn shadow archi">Testimonials</div>\
				</a></li>\
			</ul>');
			
			// change form
			$('#name').html('Name');
			$('#email').html('Email');
			$('input#l').attr('value', 'English');
			$('input#register-button').attr('value', 'Register');
			
			// change logo
			$('#logo').html('<img class="japaneselogo" src="lib/images/logo_large_w.png">');
		}
		
		// change to Japanese
		else {
			// change title
			$('#title').html('<img src="lib/images/header-jp.png">');
			
			// change language bar
			$(this).html('English');
			
			// change text in register header
			$('#register-header').html('試作モデル αlpha（要登録）:');
			
			// change archive links
			$("#archi-links").html( 
			'<ul>\
				<li id="l1"><a href="../explore/?la=ja">\
					<div class="btn shadow archi">このアーカイブについて</div>\
				</a></li>\
				<li id="l2"><a href="../seeds/?la=ja">\
					<div class="btn shadow archi">ウェブ・アーカイブ検索</div>\
				</a></li>\
				<li id="l3"><a href="http://worldmap.harvard.edu/japanmap/">\
					<div class="btn shadow archi">震災情報レイヤー地図</div>\
				</a></li>\
				<li id="l4"><a href="../featured/?la=ja">\
					<div class="btn shadow archi">わたしの「東日本大震災」</div>\
				</a></li>\
			</ul>');
			
			// change form
			$('#name').html('お名前');
			$('#email').html('Eメール');
			$('input#l').attr('value', '日本語');
			$('input#register-button').attr('value', '新規登録');
			
			// change logo
			$('#logo').html('<img class="japaneselogo" src="lib/images/logo_large_ja.png">');
		}
	});

});

