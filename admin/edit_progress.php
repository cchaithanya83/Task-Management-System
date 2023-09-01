<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $new_progress = $_POST['new_progress'];

    $sql = "UPDATE task SET progress = $new_progress WHERE id = $task_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: viewtask.php?varname=" . $_GET['varname']);
        exit;
    } else {
        echo "Error updating progress: " . mysqli_error($conn);
    }
}

// Close the database connection
$conn->close();
?>
