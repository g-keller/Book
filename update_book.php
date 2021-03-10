<?php
	require_once("db.php");
	// if get fill in boxes for modification
	// shouldn't this be 3 equal signs?
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$update_id = $_GET["id"];
		if ($update_id) {
			$book = getBook($update_id);
			
			// make sure these are sanitized if I decide to simply insert these values in directly
			$id = htmlspecialchars($book['id']);
			$title = htmlspecialchars($book['title']);
			$author = htmlspecialchars($book['author']);
			$genre = htmlspecialchars($book['genre']);
			$summary = htmlspecialchars($book['summary']);
		}
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// if post call update book and redirect to index
		$id = $_POST["bookDBId"];
		$title = $_POST["bookDBTitle"];
		$author = $_POST["bookDBAuthor"];
		$genre = $_POST["bookDBGenre"];
		$summary = $_POST["bookDBSummary"];
		if (!empty($title) && !empty($author) && !empty($genre) && !empty($summary)) {
			updateBook($id, $title, $author, $genre, $summary);
		}
		header("Location: /");
	}


?>

<!DOCTYPE html>
<html>
<head>
<title>Update Book | Book DB</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="main.js" async></script>
<style>
	form, label, input {
		display: block;
	}
</style>
</head>

<body>
<form method="POST" action="update_book.php">
	<input type="hidden" name="bookDBId" value="<?= $id ?>" />
	<label for="bookDBTitle">Title: </label>
	<input type="text" name="bookDBTitle" value="<?= $title ?>" />
	<label for="bookDBAuthor">Author: </label>
	<input type="text" name="bookDBAuthor" value="<?= $author ?>" />
	<label for="bookDBGenre">Genre: </label>
	<input type="text" name="bookDBGenre" value="<?= $genre ?>" />
	<label for="bookDBSummary">Summary: </label>
	<input type="text" name="bookDBSummary" value="<?= $summary ?>" />
	<input type="submit" />
</form>
</body>
</html>