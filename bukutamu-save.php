<?php
require_once('required/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = strip_tags(mysqli_escape_string($conn, $_POST['nama']));
    $email = strip_tags(mysqli_escape_string($conn, $_POST['email']));
    $pesan = strip_tags(mysqli_escape_string($conn, $_POST['pesan']));

    $query = "INSERT INTO bukutamu(nama, email, pesan) VALUES('{$nama}', '{$email}', '{$pesan}')";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: index.php?successMessage=Berhasil Menambahkan");
        exit();
        
    }
}