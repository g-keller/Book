<?php
	require_once('db.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// modify this to throw error if no input or bad input
		if (!empty($_POST["bookDBTitle"]) || !empty($_POST["bookDBAuthor"]) || !empty($_POST["bookDBGenre"]) || !empty($_POST["bookDBSummary"])) {
			insertBook($_POST["bookDBTitle"], $_POST["bookDBAuthor"], $_POST["bookDBGenre"], $_POST["bookDBSummary"]);
		}
	}
	header("Location: index.php");
?>