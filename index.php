<!DOCTYPE html>
<html>
<head>
<title>Book DB</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="main.js" async></script>
<style>
	form, label, input {
		display: block;
	}
</style>
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