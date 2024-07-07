<?php

require 'db.php';

function username_registred($username){
    global $cn;
    if(mysqli_num_rows(mysqli_query($cn,"SELECT * FROM accounts WHERE username='$username'")) !=0 ){
        return false;
    }else{
        return true;
    }
}

function register_credentials($name,$username,$password){
    session_start();
    global $cn;
    
    if(!username_registred($username)){
        die(json_encode(array('success'=>false,'response'=>'username already registred')));
    }
    
    $new_password = md5($password);

    $name = str_replace("'","-",$name);
    $name = str_replace("\\","-",$name);

    $username = str_replace("'","-",$username);
    $username = str_replace("\\","-",$username);
    if(strpos("-",$name) != false || strpos("-",$username)){
        die(json_encode(array('success'=>false,'response'=>'unaccepted characters')));
    }
    $now_time = date("Y-m-d H:i:s");
    $login_query = "INSERT INTO accounts values('$name','$username','$new_password','F','$now_time','$now_time');";
    $login_executed = mysqli_query($cn,$login_query) and die(json_encode(array('success'=>true,'response'=>'successfully registred !')));
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){
    register_credentials($_POST['name'],$_POST['username'],$_POST['password']);
}else{
    header("HTTP/1 405");
}

?>