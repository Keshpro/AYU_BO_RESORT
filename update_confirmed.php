<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';

// Reset all orders to not confirmed first
$conn->query("UPDATE orders SET confirmed = 0");

// Check which orders are confirmed
if (!empty($_POST['confirmed_orders'])) {
    $confirmed_orders = $_POST['confirmed_orders'];
    $ids = implode(',', array_map('intval', $confirmed_orders));
    $conn->query("UPDATE orders SET confirmed = 1 WHERE order_id IN ($ids)");
}

header("Location: orders_dashboard.php");
exit;
?>
