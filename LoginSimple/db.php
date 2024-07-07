<?php

require 'config.php';

$cn = mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD);
mysqli_select_db($cn,DB_NAME);


?>