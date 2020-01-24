<?php
    require ("../database/db.php");

    if(isset($_POST['delete'])) {
        $message = delete($_POST['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <br><br><br><br>
<div class="container">
    <a class="btn btn-success" href="insert.php">Add User</a>
    <table class="table table-hover table-stripped text-center">
        <tr class="bg-dark text-light">
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
    <?php foreach(getAllUsers() as $user){ ?> 
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['age']; ?></td>
            <td><?php echo $user['gender']; ?></td>
            <td>
                <a class="btn btn-primary" href="update.php?id=<?php echo $user['id'];?>">Edit</a>
            <form action="<?php $_SELF_PHP ?>" method="POST"> 
                <input type="text" name="id" hidden value="<?php echo $user['id'];?>">
                <input class="btn btn-danger" type="submit" name="delete" value="Delete">
            </form>   
            </td>
        </tr>
    <?php } ?>    
    </table>
</div>
</body>
</html>