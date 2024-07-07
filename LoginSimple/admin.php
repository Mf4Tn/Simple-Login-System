<?php
session_start();
if(isset($_SESSION["loggedin"]) && isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 'T'){
    echo "Hello ".$_SESSION["username"]." (Admin)<br>";
}else{
    die(header("HTTP/1 403"));
}

echo "<br><label><b>Registred Users :</b></label><br>";

echo "<table border='2'><th>Name</th><th>Username</th><th>Password (MD5)</th><th>Admin Access</th><th>Last Login</th><th>Creation Time</th>";
require 'db.php';
$users_query_executed = mysqli_query($cn,"SELECT * FROM accounts");
while($t = mysqli_fetch_assoc($users_query_executed)){
    echo "<tr><td>{$t['name']}</td><td>{$t['username']}</td><td>{$t['password']}</td><td>".($t['is_admin'] == 'T' ? 'True':'False')."</td><td>{$t['last_login']}</td><td>{$t['creation_time']}</td></tr>";
}

?>