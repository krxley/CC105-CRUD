<?php
    include "database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php

        $id = $_GET['account_id'];
        $sql = "SELECT * FROM user_accounts WHERE account_id = $id";
        $retrieved = $connection->query($sql);
        $data = $retrieved->fetch_assoc();
    
    ?>

    <div style = "display: flex; justify-content: center; margin-top: 50px;">

        <div style = "border: 1px solid black; padding: 40px; border-radius: 10px;">

            <h1>Edit User Account</h1>
            <form action="functions/update_account.php" method = "POST">
                <input type="hidden" name="id" value="<?=htmlspecialchars($data['account_id'])?>" required>
                <label for="">Email</label>
                <input type="email" name="email" class = "form-control" value="<?=htmlspecialchars($data['email'])?>" required>

                <label for="" style = "margin-top: 20px;">Last Name</label>
                <input type="text" name="lastname" class = "form-control" value="<?=htmlspecialchars($data['last_name'])?>" required>

                <label for="" style = "margin-top: 20px;">First Name</label>
                <input type="text" name="firstname" class = "form-control" value="<?=htmlspecialchars($data['first_name'])?>" required>

                <label for="" style = "margin-top: 20px;">Address</label>
                <input type="address" name="address" class = "form-control" value="<?=htmlspecialchars($data['address'])?>" required>
            
                <div>
                    <button type="submit" class = "btn btn-primary form-control">Submit</button>
                </div>
            </form>

        </div>
        
    </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>