<?php

mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

$hostname = "localhost";
$username = "root";
$password =  "";
$database = "task";

try {
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
} catch (mysqli_sql_exception $e) {
   echo $e->getMessage();
}

?>