<?php

//conexão com o BD

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_connect_error()):
    echo "falha na conexão".mysqli_connect_error();
endif;