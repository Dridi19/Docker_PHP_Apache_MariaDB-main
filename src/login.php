<?php
        session_start();

		$connection = new mysqli("db", "root", "password", "db_blog");
		$username = $_GET["username"];
		$password =$_GET["password"];
		$data = $connection->query("SELECT id FROM users WHERE username='$username' AND password='$password'");
        $row = mysqli_fetch_assoc($data);
        //if account doesn't exist create one   
		if ($data->num_rows <= 0) {
            $email = $connection->query("SELECT id FROM users WHERE username='$username'");
            $email = mysqli_fetch_assoc($data);
            if ($email) {
                $insert = $connection->query("INSERT INTO users(username, password ) VALUES ('$username','$password')");
                $data = $connection->query("SELECT id FROM users WHERE username='$username' AND password='$password'");
                $row = mysqli_fetch_assoc($data);
            } else {
                header("Location: index.php");
                exit('verify you password');
            }
		} 
        $id = (string)$row["id"]["0"]; 
        // save login informations in session
        $_SESSION["id"] = $id;
        $_SESSION["loggedIn"] = 1;
        header("Location: blog.php");
        exit();
?>
