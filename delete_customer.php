<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nic'])) {
    $nic = $_POST['nic'];

    $stmt = $conn->prepare("DELETE FROM customers WHERE nic = ?");
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $stmt->close();

    header("Location: adminmgmt.php?tab=customer");
    exit();
}
?>
