<?php
	require_once('db.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// modify this to throw error if no input or bad input
		insertBook($_POST["bookDBTitle"], $_POST["bookDBAuthor"], $_POST["bookDBGenre"], $_POST["bookDBSummary"]);
	}
	header("Location: index.php");
?>