<html>
	<head>
	</head>
	<body>
		<ol>
			 <?php foreach ($this->elements as $element) { ?>
				<li>|<?=$element->movie_id?> | <?=$element->movie_start?> |</li>
			 <?php } ?>
		</ol>
	</body>
</html>
