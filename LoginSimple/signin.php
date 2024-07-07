<?php

function check_credentials($username,$password){
    session_start();
    require 'db.php';
    $now_time = date("Y-m-d H:i:s");
    $new_password = md5($password);
    $username = str_replace("'","-",$username);
    $username = str_replace("\\","-",$username);
    $login_query = "SELECT * FROM accounts WHERE username='$username' AND password='$new_password';";
    $login_executed = mysqli_query($cn,$login_query);
    if(mysqli_num_rows($login_executed) != 0){
        mysqli_query($cn,"UPDATE accounts SET last_login='$now_time' WHERE username='$username';");
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["is_admin"] = mysqli_fetch_assoc($login_executed)["is_admin"]; 
        mysqli_close($cn);
        die(json_encode(array('success'=>true,'response'=>'logged in successfully')));
    }else{
        mysqli_close($cn);
        die(json_encode(array('success'=>false,'response'=>'invalid username or password')));
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])){
    check_credentials($_POST['username'],$_POST['password']);
}else if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "POST"){
    header("HTTP/1 405");
}

?>