<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    if ($title !== "") {
        $id = $_SESSION['nextId']++;
        $_SESSION['tasks'][$id] = ['id' => $id, 'title' => $title, 'completed' => false];
    }
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
</head>

<body>

    <h1>Create Task</h1>
    <form method="post">
        <input type="text" name="title" placeholder="Enter task title" required>
        <button type="submit">Add Task</button>
    </form>
    <br>
    <a href="index.php">Back</a>

</body>

</html>