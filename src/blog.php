<?php
        session_start();
        $id = $_SESSION["id"];
		$connection = new mysqli("db", "root", "password", "db_blog");
		$data = $connection->query("SELECT title,content,t2.id,user_id,username FROM posts t1 INNER JOIN users t2 
        ON t1.user_id = t2.id;");
        $row = mysqli_fetch_all($data);
        // delete post
        if (isset($_POST["delete"])) {
            $idtodelete = $_POST["messageid"];
            $delet = $connection->query("DELETE FROM `posts` WHERE id='$idtodelete'");
        }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div class="container">
            <!-- navbar -->
            <div class="navbar">
                <div class="logo_div">
                    <a href="index.php"><h1>LifeBlog</h1></a>
                </div>
                <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>

            <p>Bienvenue, vous êtes connecté</p>
        <p>Vous pouvez créer un nouvel article en remplissant le formulaire ci-dessous</p>
        

    <div class="post_div">
        <form action="article.php" method="get" >
            <h2>Post your article</h2>
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="content"  placeholder="Your Article"> 
            <button class="btn" type="submit" name="post_btn">Post your article</button>
        </form>
    </div>

    <table class="minimalistBlack">
        <thead><tr>

            <th>User</th>
            <th>Title</th>
            <th>Content</th>
            
        </thead>
        <tbody>
        <?php foreach ($row as $value){  ?>
        <tr>

        <td><?= $value[4] ?></td>
        <td><?= $value[0] ?></td>
        <td><?= $value[1] ?></td>
        <td>
        <?php if($value[2] == $id){ ?>
        <input type="submit" value="delete" class="delete" id="<?= $value[3] ?>">
            <?php };?>
        </td>
        
        </tr>
        <?php }; ?>
        
        
        </tbody>
        </table>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>   
    <script type="text/javascript">
        $(document).ready(function () {
            $(".delete").on("click",function(){
                var messageid = $(this).prop('id');
                $.ajax(
                    {
                        type: 'POST',
                        url: 'blog.php',
                        data:{
                            delete:1,
                            messageid:messageid,
                        },
                        success: function(response){
                            console.log(response)
                            location.reload();                            
                        },
                        datatype:'text'
                    }
                )
            })})
    </script>
</html>