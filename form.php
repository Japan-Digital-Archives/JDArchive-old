<!DOCTYPE html>

<html>
<head>
<script type="text/javascript">
	function f() {
		if (document.s.email.value=="")
			alert("error not equal!");
		else if (document.s.email2.value=="")
			alert("error not equal!");
		else if (document.s.email2.value != document.s.email.value)
			alert("error not equal!");
	}
</script>
</head>
<body>
	<form action="form.php" method="post" name="s" onsubmit="f();">
		Email Address: <input id="email" name="email" type="text">
		Email Address: <input id="email2" name="email2" type="text">
		<input type="submit" value="Suscribe">
	</form>
</body>
</html>