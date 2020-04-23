<?php 
    $BD_HOST = "localhost";
    $DB_DATABASE = "db_starbhak";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_PORT = "3306";

    $db1 = new mysqli($BD_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);

    if($db1->connect_error){
        die('Connection failed: ' .$conn->connect_error);
    }
?>