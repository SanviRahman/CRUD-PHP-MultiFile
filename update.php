<?php
session_start();

$id = $_GET['id'] ?? null;
if ($id && isset($_SESSION['tasks'][$id])) {
    $task = $_SESSION['tasks'][$id];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        if ($title !== "") {
            $_SESSION['tasks'][$id]['title'] = $title;
        }
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Task</title>
</head>

<body>

    <h1>Update Task</h1>
    <form method="post">
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">Back</a>

</body>

</html>