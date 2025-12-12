<?php

    include "../database/connection.php";
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $address = $_POST['address'];

        $sql = "INSERT INTO user_accounts(email, last_name, first_name, address)
                VALUES('$email', '$lastname', '$firstname', '$address')";

        if($connection->query($sql) === TRUE){
            header("Location: ../index.php");
            exit();
        }
    }

    $connection->close();
?>