<?php
require_once('../required/database.php');

if (isset($_GET['id'])) {
    $id = strip_tags(mysqli_escape_string($conn, $_GET['id']));

    $query = "DELETE FROM bukutamu WHERE id = {$id}";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php?successMessage=Berhasil Hapus bukutamu");
        exit();
    } else {
        header("Location: index.php?errorMessage=Berhasil Hapus bukutamu");
        exit();
    }
} else {
}
?>