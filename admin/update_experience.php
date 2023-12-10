<?php
require_once('../required/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']); 
$title = strip_tags(mysqli_escape_string($conn, $_POST['title']));
$tools = strip_tags(mysqli_escape_string($conn, $_POST['tools']));
$description = strip_tags(mysqli_escape_string($conn, $_POST['description']));

    // Update query
    $query = "UPDATE experience SET title='{$title}', tools='{$tools}', description='{$description}' WHERE id={$id}";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php?successMessage=Berhasil Memperbarui");
        exit();
    } else {
        // Handle the error, redirect or display an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect or handle the case when the form is not submitted using POST
    echo "Invalid request method.";
}
?>
