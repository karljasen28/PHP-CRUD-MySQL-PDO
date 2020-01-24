<?php
    require("../database/db.php");
    
    if(isset($_POST['insert'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        $message = insert($name,$age,$gender);
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
    <h3>Insert User Information</h3>
    <?php if(!empty($message)) {?>
        <h4 class="alert alert-success"><?php echo $message;?></h4>
    <?php } ?>
    <form class="form-horizontal" action="<?php $_SELF_PHP ?>" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input class="form-control" type="number" placeholder="Age" name="age">
        </div>
        <div class="form-group">
            <select class="form-control" name="gender">
                <option hidden>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary col" type="submit" value="Insert" name="insert">
        </div>
    </form>
    <a href="index.php">Back to table</a>
</div>
</body>
</html>