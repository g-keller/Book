<!DOCTYPE html>
<html>
<head>
<title>Book DB</title>
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="main.js" async></script>
<style>
	form, label, input {
		display: block;
	}
</style>
</head>

<body>
<div id="overlay">
	<div id="inner">
	<form method="POST" action="create_book.php">
		<label for="bookDBTitle">Title: </label>
		<input type="text" name="bookDBTitle" />
		<label for="bookDBAuthor">Author: </label>
		<input type="text" name="bookDBAuthor"/>
		<label for="bookDBGenre">Genre: </label>
		<input type="text" name="bookDBGenre" />
		<label for="bookDBSummary">Summary: </label>
		<input type="text" name="bookDBSummary"/>
		<div style="display: flex; align-items: center;">
		<input type="submit" />
		<button type="button" name="cancel">Cancel</button>
		</div>
	</form>
	</div>
</div>
<header>
	<h1 style="margin: auto;">Book Database</h1>
	<button type="button" id="add">Add Book</button>
</header>
<main>
<?php
	require_once('db.php');
	echoBookList();
?>
</main>
</body>
</html>