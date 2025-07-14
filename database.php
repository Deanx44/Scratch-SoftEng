<!DOCTYPE html>
<html>

<head>
	<title>Connect</title>
</head>

<body>

	<?php
    $servername = "localhost";
	$username = "root";
	$pass = "";
	$db = "zorella";

	$conn = mysqli_connect($servername, $username, $pass , $db);

	if(!$conn) {
	    die("Connection Failed" . mysqli_connect_error($conn));
	}
            
	$db = "CREATE DATABASE zorella";
	if(mysqli_query($conn, $db)) {
	    echo "Database Created";
	} else {
	    echo "Error creating database: " . mysqli_error($conn);
	}

	mysqli_close($conn);
	?>

</body>

</html>