<?php
    include "database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
        $sql = "SELECT * FROM user_accounts";
        $retrieved = $connection->query($sql);
    ?>

    <div class="container" style = "margin-top: 70px;">
        
        <h1>Youtube Accounts Management System</h1>

        <div style = "display: flex; justify-content: flex-end; margin-top: 40px;">
            <button data-bs-toggle = "modal" data-bs-target = "#accountModal" type = "button" class = "btn btn-primary">Add Account</button>
        </div>

        <table class = "table" style = "margin-top: 20px;">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while($data = $retrieved->fetch_assoc()): ?>
                    <tr>
                        <td><?=htmlspecialchars($data['email'])?></td>
                        <td><?=htmlspecialchars($data['last_name'])?></td>
                        <td><?=htmlspecialchars($data['first_name'])?></td>
                        <td><?=htmlspecialchars($data['address'])?></td>
                        <td>
                            <a href="edit_page.php?account_id=<?=htmlspecialchars($data['account_id'])?>" class = "btn btn-warning w-40">Edit</a>
                            <button class = "btn btn-danger w-40" onclick = "deletePop(<?=htmlspecialchars($data['account_id'])?>)">Del</button>
                        </td>
                    </tr>
                <?php endwhile?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id = "accountModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4>Add Account</h4>
                    <button class = "btn-close" data-bs-dismiss = "modal"></button>
                </div>

                <div class = "modal-body">

                    <form action="functions/add_account.php" method = "POST">
                        <label for="">Email</label>
                        <input type="email" name="email" class = "form-control" required>

                        <label for="" style = "margin-top: 20px;">Last Name</label>
                        <input type="text" name="lastname" class = "form-control" required>

                        <label for="" style = "margin-top: 20px;">First Name</label>
                        <input type="text" name="firstname" class = "form-control" required>

                        <label for="" style = "margin-top: 20px;">Address</label>
                        <input type="address" name="address" class = "form-control" required>
                    
                        <div class="modal-footer">
                            <button type="submit" class = "btn btn-primary">Add</button>
                        </div>
                    
                    </form>
                </div>
                    
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function deletePop(id){
        Swal.fire({
            title: "Confirm?",
            text: "This is permanent.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "functions/delete_account.php?id=" + id;
                Swal.fire({
                title: "Deleted!",
                text: "Account has been deleted.",
                icon: "success"
                });
            }
        });
    }
</script>
</html>