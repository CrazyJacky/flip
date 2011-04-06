<html>
<head>
<script src="http://code.jquery.com/jquery-1.4.4.js"></script>
</head>
<body>
<b>Flip</b> by Nick Place
<hr />
<p><form id="goto" action="javascript:void();">
	Lets get started! <br />
	localhost/  <input type="text" id="new-user" /> <input type="submit" value="GO!" id="userpage"/>
 </form></p>

<script>
$('form#goto').submit( function() {
	window.location.href = $('#new-user').val();
});
</script>
</body>
</html>
