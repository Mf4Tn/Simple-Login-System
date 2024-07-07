<?php

session_start();

if(isset($_SESSION["loggedin"])){
    $output = array("loggedin"=>TRUE,"username"=>$_SESSION["username"]);
    if($_SESSION["is_admin"] == 'T'){
        $output["is_admin"] == TRUE;
    }
    echo json_encode($output);
}else{
    echo json_encode(array("loggedin"=>FALSE));
}
?>