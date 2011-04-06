<! DOCTYPE html >
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.4.4.js"></script>
	<script src="/media/js/create.js"></script>	
</head>
<body>
<b>Flip</b> for <?=$author; ?>
<p> <a href="/<?=$author; ?>">home</a></p>
<hr />
<div id="create-cards">
<p>
	<input id="title" value="<?=$set_arr['title'] ?>" />
</p>
	<?php
	if (isset($set_arr['cards'][0])) {
		foreach ($set_arr['cards'] as $card) { ?>
			<div class="card">
				<input class="term" value="<?=$card['term'] ?>"/>
				<input class="def" value="<?=$card['def'] ?>"/>
			</div>
		<?php } 
	} ?>
	<div class="card bottom">
		<input class="term" value="term"/>
		<input class="def" value="definition"/>
	</div>
</div>
<span id='rec'></span>
<script>


createSet = new setEditor($('#create-cards'), {'setId' : '<?=$set_arr["_id"]?>'});

</script>

</body>
</html
