<?php
require_once('required/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = strip_tags(mysqli_escape_string($con, $_POST['username']));
    $password = strip_tags(mysqli_escape_string($con, $_POST['password']));

    $passwordHash = md5($password);

    $query = "INSERT INTO user(username, password) VALUES('{$username}', '{$passwordHash}')";
    $result = mysqli_query($con, $query);

    if($result){
        header("Location: index.php?successMessage=Berhasil Menambahkan User");
        exit();
        
    }
}