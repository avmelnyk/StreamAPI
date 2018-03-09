<html>
<style>
	body {
	  margin:0;
	}
	
	table{
		border: 2px black solid;
		padding: 25px 25px 25px 25px;
		margin: auto auto;
	}
	th {
	  width: 200px;
	  font-size: 20pt;
	  padding: 25px 25px 25px 25px;
	}
</style>
	<body>
	<form action="movies" method="post">
		<table>
			<th colspan="2">Movies</th>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="id"><br></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="name"><br></td>
			</tr>
			<tr>
				<td>Rate: </td>
				<td><input type="number" name="rate"><br></td>
			</tr>
			<tr>
				<td>Length: </td>
				<td><input type="number" name="length"><br></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Add new movie"></td>
			</tr>
		</table>
	</form>
	<table>
	  <?php foreach ($this->all_movies as $movie) { ?>
		<tr>
			<td><?=$movie->id?></td>
			<td><?=$movie->name?></td>
			<td><?=$movie->rate?></td>
			<td><?=$movie->length?></td>
		</tr>
	  <?php } ?>
	</table>
	</body>
</html>
