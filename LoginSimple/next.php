<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting ...</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION["loggedin"])){
        if($_SESSION["is_admin"] == 'T'){
            header("location: admin.php");
        }else{
            header("location: user.php");
        }
    }
    ?>
</body>
</html>