<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

include 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nic = trim($_POST['nic']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);

    if ($nic === '' || $name === '' || $phone === '') {
        $error = "Please fill in all required fields.";
    } else {
        $stmt = $conn->prepare("INSERT INTO customers (nic, name, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nic, $name, $phone);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: adminmgmt.php");
            exit;
        } else {
            $error = "Error inserting customer. Possible duplicate NIC.";
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><title>Add Customer</title></head>
<body>
<h1>Add Customer</h1>add_customer.php
<?php if ($error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="POST" action="">
    <label for="nic">NIC:</label><br>
    <input type="text" id="nic" name="nic" maxlength="20" required><br>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" maxlength="100" required><br>
    <label for="phone">Phone Number:</label><br>
    <input type="tel" id="phone" name="phone" maxlength="20" required><br><br>
    <button type="submit">Add Customer</button>
</form>
<p><a href="adminmgmt.php">Back to Admin Management</a></p>
</body>
</html>
