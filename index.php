<!DOCTYPE html>
<html>
<head>

</head>

<body>
<?php
	require_once('db.php');
	echoBookList();
?>
<form method="POST" action="create_book.php">
	<label for="bookDBTitle">Title: </label>
	<input type="text" name="bookDBTitle" />
	<label for="bookDBAuthor">Author: </label>
	<input type="text" name="bookDBAuthor"/>
	<label for="bookDBGenre">Genre: </label>
	<input type="text" name="bookDBGenre" />
	<label for="bookDBSummary">Summary: </label>
	<input type="text" name="bookDBSummary"/>
	<input type="submit" />
</form>
</body>
</html>