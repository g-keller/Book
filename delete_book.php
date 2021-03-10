<?php
	require_once("db.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_POST["id"];
		if (!empty($id)) {
			deleteBook($id);

		}
	}
	createBook("todd", "todd", "todd", "rodd");
?>