<?php
session_start();

// ---- Data Store ----
if (!isset($_SESSION['tasks']) || !is_array($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [
        1 => ['id' => 1, 'title' => 'Sample Task', 'completed' => false]
    ];
    $_SESSION['nextId'] = 2;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP CRUD</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        button,
        a {
            padding: 5px 10px;
            margin: 2px;
            cursor: pointer;
            text-decoration: none;
        }

        a {
            border: 1px solid #000;
        }
    </style>
</head>

<body>

    <h1>CRUD Operation</h1>

    <!-- Create Button -->
    <a href="create.php">Add New Task</a>

    <!-- Task List -->
    <?php if (!empty($_SESSION['tasks'])): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            <?php foreach ($_SESSION['tasks'] as $task): ?>
                <?php if (is_array($task)): ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $task['id'] ?>">Update</a>
                            <a href="delete.php?id=<?= $task['id'] ?>" style="background:red;color:white;"
                                onclick="return confirm('Are you sure to delete this task?');">Delete</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</body>

</html>