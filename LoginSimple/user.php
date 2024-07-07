<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["loggedin"])){
        header("location: index.html");
    }else{
        echo "Hello, {$_SESSION['username']}";
    }

    ?>
</body>
</html>