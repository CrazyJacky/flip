<html><head></head>
<body>
<b>Flip</b> for <?=$author; ?>
<hr />
<p>
	<a href="<?=$author?>/create" >New Set</a>
</p>
<hr />
<p>
	<ul>
	<?php for($i=0; $i<$sets->count(); $i++) {
		$set = $sets->getNext();
		echo '<li><a href="' . $author . '/create/index/' . $set['_id'] . '">'. $set['title'] . '</a></li>';
	} ?>
	</ul>
</p>

</body>
</html>
