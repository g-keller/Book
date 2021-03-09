<!DOCTYPE html>
<html>
<head>

</head>

<body>
<?php
	require_once('db.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// modify this to throw error if no input or bad input
		echo $_POST["bookDBTitle"];
		echo $_POST["bookDBAuthor"];
		echo $_POST["bookDBGenre"];
		echo $_POST["bookDBSummary"];
		insertBook($_POST["bookDBTitle"], $_POST["bookDBAuthor"], $_POST["bookDBGenre"], $_POST["bookDBSummary"]);
	}
	echoBookList();
?>
<form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
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