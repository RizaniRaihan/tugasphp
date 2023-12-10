<?php
require_once('../required/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = strip_tags(mysqli_escape_string($conn, $_POST['title']));
    $tools = strip_tags(mysqli_escape_string($conn, $_POST['tools']));
    $description = strip_tags(mysqli_escape_string($conn, $_POST['description']));

    $query = "INSERT INTO experience(title, tools, description) VALUES('{$title}', '{$tools}', '{$description}')";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: index.php?successMessage=Berhasil Menambahkan");
        exit();
        
    }
}