<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "bus_ticket_system";

$conn = mysqli_connect($server, $username, $password,$dbname);

if($conn->connect_error){
    die("Connection Failed: ".$conn->connecti_error);
}
else{
    mysqli_select_db($conn, $dbname);
    //echo "Connection Successful";
}

?>