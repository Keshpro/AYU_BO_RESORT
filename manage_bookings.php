<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_booking'])) {
    $order_id = (int)$_POST['order_id'];
    $nic = trim($_POST['nic']);
    $room_id = trim($_POST['room_id']);
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $stmt = $conn->prepare("UPDATE orders SET nic=?, room_id=?, check_in=?, check_out=? WHERE order_id=?");
    $stmt->bind_param("ssssi", $nic, $room_id, $check_in, $check_out, $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_bookings.php");
    exit();
}

// Fetch booking to edit if 'edit' parameter set
$edit_booking = null;
if (isset($_GET['edit'])) {
    $order_id = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT order_id, nic, room_id, check_in, check_out FROM orders WHERE order_id=?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $edit_booking = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Fetch all bookings with customer name and room name
$sql = "SELECT o.order_id, o.nic, c.name as customer_name, c.email, o.room_id, r.name as room_name, o.check_in, o.check_out
        FROM orders o
        JOIN customers c ON o.nic = c.nic
        JOIN rooms r ON o.room_id = r.id
        ORDER BY o.check_in DESC";

$bookings = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings</title>
    <style>
        body { font-family: Verdana, Geneva, Tahoma, sans-serif; margin: 30px; color: #5a4d32; background: #fff; }
        h2 { color: #bfa14b; margin-bottom: 10px; }
        table { border-collapse: collapse; width: 100%; max-width: 1000px; margin-bottom: 30px; }
        th, td { border: 1px solid #eee; padding: 10px 14px; text-align: left; }
        th { background-color: #f5f0d6; font-weight: 700; color: #a1863c; }
        tr:hover { background-color: #fffbea; }
        a.edit-btn {
            color: #bfa14b;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }
        a.edit-btn:hover {
            text-decoration: underline;
        }
        form {
            border: 2px solid #bfa14b;
            padding: 20px;
            max-width: 600px;
            border-radius: 10px;
            background-color: #fffbea;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 700;
            color: #a1863c;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 8px 10px;
            border: 1.5px solid #bfa14b;
            border-radius: 6px;
            font-size: 1rem;
        }
        select {
            width: 100%;
            padding: 8px 10px;
            border: 1.5px solid #bfa14b;
            border-radius: 6px;
            font-size: 1rem;
            color: #5a4d32;
        }
        button {
            margin-top: 18px;
            background-color: #bfa14b;
            border: none;
            padding: 12px 22px;
            font-weight: 700;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #d4b75a;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #bfa14b;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .back-btn:hover {
            background-color: #d4b75a;
        }
    </style>
</head>
<body>

<h2>Manage Bookings</h2>

<a href="adminmgmt.php" class="back-btn">&larr; Back to Dashboard</a>

<?php if ($edit_booking): ?>
    <h3>Edit Booking Order ID: <?= htmlspecialchars($edit_booking['order_id']) ?></h3>
    <form method="POST" action="manage_bookings.php">
        <input type="hidden" name="order_id" value="<?= htmlspecialchars($edit_booking['order_id']) ?>">

        <label for="nic">Customer NIC</label>
        <select id="nic" name="nic" required>
            <?php
            $cust_res = $conn->query("SELECT nic, name FROM customers ORDER BY name");
            while ($cust = $cust_res->fetch_assoc()):
                $selected = ($cust['nic'] === $edit_booking['nic']) ? "selected" : "";
            ?>
                <option value="<?= htmlspecialchars($cust['nic']) ?>" <?= $selected ?>><?= htmlspecialchars($cust['name']) ?> (<?= htmlspecialchars($cust['nic']) ?>)</option>
            <?php endwhile; ?>
        </select>

        <label for="room_id">Room</label>
        <select id="room_id" name="room_id" required>
            <?php
            $room_res = $conn->query("SELECT id, name FROM rooms ORDER BY id");
            while ($room = $room_res->fetch_assoc()):
                $selected = ($room['id'] === $edit_booking['room_id']) ? "selected" : "";
            ?>
                <option value="<?= htmlspecialchars($room['id']) ?>" <?= $selected ?>><?= htmlspecialchars($room['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label for="check_in">Check-in Date</label>
        <input type="date" id="check_in" name="check_in" value="<?= htmlspecialchars($edit_booking['check_in']) ?>" required>

        <label for="check_out">Check-out Date</label>
        <input type="date" id="check_out" name="check_out" value="<?= htmlspecialchars($edit_booking['check_out']) ?>" required>

        <button type="submit" name="update_booking">Update Booking</button>
    </form>
    <p><a href="manage_bookings.php">&larr; Cancel Edit</a></p>
<?php else: ?>

    <table>
        <thead>
            <tr>
                <th>Order ID</th><th>Customer NIC</th><th>Customer Name</th><th>Email</th><th>Room</th><th>Check-in</th><th>Check-out</th><th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $bookings->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['order_id']) ?></td>
                <td><?= htmlspecialchars($row['nic']) ?></td>
                <td><?= htmlspecialchars($row['customer_name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['room_name']) ?></td>
                <td><?= htmlspecialchars($row['check_in']) ?></td>
                <td><?= htmlspecialchars($row['check_out']) ?></td>
                <td><a class="edit-btn" href="manage_bookings.php?edit=<?= (int)$row['order_id'] ?>">Edit</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php endif; ?>

</body>
</html>
