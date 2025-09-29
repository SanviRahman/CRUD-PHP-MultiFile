<?php
session_start();

$id = $_GET['id'] ?? null;
if ($id && isset($_SESSION['tasks'][$id])) {
    unset($_SESSION['tasks'][$id]);
}

header("Location: index.php");
exit;
