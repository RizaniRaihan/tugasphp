<?php
require_once('../required/database.php');

if (isset($_GET['id'])) {
    $id = strip_tags(mysqli_escape_string($conn, $_GET['id']));

    $query = "DELETE FROM experience WHERE id = {$id}";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $successMessage = "experience berhasil dihapus";
        header("Location: index.php?successMessage=Berhasil Hapus Experience");
        exit();
    } else {
        $errorMessage = "Gagal menghapus experience";
        header("Location: index.php?errorMessage=Berhasil Hapus Experience");
        exit();
    }
} else {
}
?>