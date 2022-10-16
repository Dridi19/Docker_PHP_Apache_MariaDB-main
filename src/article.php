<?php
        session_start();

		$connection = new mysqli("db", "root", "password", "db_blog");
		$title = $_GET["title"];
        $id = $_SESSION["id"];
		$content =$_GET["content"]; 
        $insert = $connection->query("INSERT INTO posts(title, content, user_id ) VALUES ('$title','$content', '$id')");
        header("Location: blog.php");
        exit();
?>
