<?php
	// secure DB credentials
	require_once('vendor/autoload.php');
	$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
	$dotenv->load();
	
	$servername = $_ENV['dbservername'];
	$username = $_ENV['dbusername'];
	$password = $_ENV['dbpassword'];
	$dbname = 'bookdb';

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// this may need more or better handling
	if ($conn->connect_error) {
		die("Connection Failed: " . $conn->connect_error);
	}	
	
	function echoBookList() {
		// remember to escape out this user input data
		global $conn;
		$sql = "select * from book";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			while ($row) {
				$component = createBookDataComponent($row['id'], $row['title'], $row['author'], $row['genre'], $row['summary']);
				echo $component;
				$row = $result->fetch_assoc();
			}
		}	
		$result->close();
	}
	
	function createBookDataComponent($id, $raw_title, $raw_author, $raw_genre, $raw_summary) {
		$title = !empty($raw_title) ? htmlspecialchars($raw_title) : "[TITLE NOT SPECIFIED]";
		$author = !empty($raw_author) ? htmlspecialchars($raw_author) : "[AUTHOR NOT SPECIFIED]";
		$genre = !empty($raw_genre) ? htmlspecialchars($raw_genre) : "[GENRE NOT SPECIFIED]";
		$summary = !empty($raw_summary) ? htmlspecialchars($raw_summary) : "[SUMMARY NOT SPECIFIED]";
		$basic_info_line = "<p>$title" . " " . $author . " " . $genre . "</p>";
		$summary_line = "<p>$summary</p>";
		$update_button = "<button type='button' name='update' value='$id'>Update</button>";
		$delete_button = "<button type='button' name='delete' value='$id'>Delete</button>";
		return "<article class='book-component'>" . $basic_info_line . $summary_line . " " . $update_button . $delete_button . "</article>";
	}
	
	function getBook($book_id) {
		global $conn;
		$stmt = mysqli_prepare($conn, "select * from book where id = ?");
		mysqli_stmt_bind_param($stmt, "s", $book_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($result) {
			return $result->fetch_assoc();
		}
	}
	
	function insertBook($title, $author, $genre, $summary) {
		// maybe use errno function to check for success?
		// https://www.php.net/manual/en/mysqli-stmt.get-result.php
		global $conn;
		$stmt = mysqli_prepare($conn, "insert into book (title, author, genre, summary)
				values (?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "ssss", $title, $author, $genre, $summary);
		mysqli_stmt_execute($stmt);
	}
	
	function updateBook($book_id, $title, $author, $genre, $summary) {
		global $conn;
		$stmt = mysqli_prepare($conn, "update book
									   set title = ?, author = ?, genre = ?, summary = ?
									   where id = ?");
		mysqli_stmt_bind_param($stmt, "sssss", $title, $author, $genre, $summary, $book_id);
		mysqli_stmt_execute($stmt);
	}
	
	function deleteBook($book_id) {
		global $conn;
		$sql = "delete from book where id = $book_id";
		$result = $conn->query($sql);
	}
?>