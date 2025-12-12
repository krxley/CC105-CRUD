<?php

    include "../database/connection.php";
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        $email = $_POST['email'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $address = $_POST['address'];

        $sql = 
        "UPDATE user_accounts SET
            email = '$email',
                last_name = '$lastname',
            first_name = '$firstname',
            address = '$address'
            WHERE account_id = $id
        ";

        if($connection->query($sql) === TRUE){
            header("Location: ../index.php");
            exit();
        }
    }

    $connection->close();
?>