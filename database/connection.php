<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "yt";

$connection = new mysqli(
    $server,
    $user,
    $password,
    $database
);

if ($connection->connect_error) {
    die("Database did not connect: " . $connection->connect_error);
}

?>
