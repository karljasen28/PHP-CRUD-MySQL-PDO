<?php
    require("../database/db.php");
    
    if(isset($_POST['update'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];

        $message = update($name,$age,$_GET['id']);
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
    <h3>Update user information</h3>
    <?php if(!empty($message)) {?>
        <h4 class="alert alert-success"><?php echo $message;?></h4>
    <?php } ?>
    <form class="form-horizontal" action="<?php $_SELF_PHP ?>" method="POST">
    <?php foreach(getUserId($_GET['id']) as $user) { ?>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Name" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="number" placeholder="Age" name="age" value="<?php echo $user['age']; ?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary col" type="submit" value="Update" name="update">
        </div>
    <?php } ?>    
    </form>
    <a href="index.php">Back to table</a>
</div>
</body>
</html>