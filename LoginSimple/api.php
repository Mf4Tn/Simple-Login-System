<?php

function is_admin(){
    session_start();
    return $_SESSION['is_admin'] == 'T';
}



?>