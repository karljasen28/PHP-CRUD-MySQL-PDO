<?php
function db() {
    return new PDO("mysql:host=localhost;dbname=crud","root","");
}

// insert - Create
function insert($name, $age, $gender) {
    $db = db();
    $sql = "INSERT INTO users(name, age, gender) VALUES (?,?,?)";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($name,$age,$gender));
    $db = null;

    return "User inserted...";
}

// get - Retrieve
function getAllUsers() {
    $db = db();
    $sql = "SELECT * FROM users";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $row = $cmd->fetchAll();
    $db = null;

    return $row;
}

// edit - Update
// but first before we update the user
// we must retrieve the ID of the particular
// user that we will be updating...
function getUserId($id) {
    $db = db();
    $sql = "SELECT * FROM users WHERE id = ?";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($id));
    $row = $cmd->fetchAll();
    $db = null;

    return $row;
}

function update($name, $age, $id) {
    $db = db();
    $sql = "UPDATE users SET name = ?, age = ? WHERE id = ?";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($name, $age, $id));
    $db = null;

    return "User updated...";
}

// remove - Delete
function delete($id) {
    $db = db();
    $sql = "DELETE FROM users WHERE id = ?";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($id));
    $db = null;

    return "User deleted";
}
?>