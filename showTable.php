<!DOCTYPE html>

<html>
	<head>
		<title>MySQL Table Viewer</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$query = "SELECT username, firstName, email FROM Users ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	$fields_num = mysqli_num_fields($result);
	echo "<h1>Table: {$table}</h1>";
	echo "<table id='t01'><tr>";
	// printing table headers

	echo "<td><b>username</b></td>";
	echo "<td><b>First Name</b></td>";
	echo "<td><b>Email</b></td>";

	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable
		foreach($row as $cell)
			echo "<td>$cell</td>";
		echo "</tr>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>
