<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Database connection (adjust with actual credentials)
$servername = "localhost";
$username = "root";
$password = ""; // your DB password
$dbname = "hotel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking orders with customer and room info
$sql = "SELECT o.order_id, o.nic, c.name, c.phone, o.room_id, r.name AS room_name, 
        o.check_in, o.check_out, o.created_at, o.confirmed
        FROM orders o
        LEFT JOIN customers c ON o.nic = c.nic
        LEFT JOIN rooms r ON o.room_id = r.id
        ORDER BY o.created_at DESC";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Booking Orders Dashboard</title>
    <style>
        /* Base styles */
        body {
    background-color: #fffbea;
    background-image: url('assets/orderbg.png'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #5a4d32;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 40px;
    line-height: 1.5;
}

        h2 {
            color: #bfa14b;
            font-weight: 700;
            margin-bottom: 24px;
            letter-spacing: 1px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(191, 161, 75, 0.15);
            overflow: hidden;
            border: 2px solid #bfa14b;
        }
        thead th {
            background-color: #f5f0d6;
            color: #a1863c;
            font-weight: 700;
            padding: 14px 20px;
            text-align: left;
            letter-spacing: 0.05em;
        }
        tbody td {
            padding: 12px 20px;
            color: #5a4d32;
            border-bottom: 1px solid #f0e6a5;
        }
        tbody tr:hover {
            background-color: #fff5b1;
            transition: background-color 0.3s ease;
        }
        /* Buttons */
        button {
            background-color: #bfa14b;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 30px;
            margin-right: 15px;
            transition: background-color 0.3s ease;
            box-shadow: 0 6px 16px rgba(191, 161, 75, 0.45);
        }
        button:hover {
            background-color: #d4b75a;
            box-shadow: 0 8px 20px rgba(212, 183, 90, 0.7);
        }
        button.cancel-btn {
        background-color: #b00020;
         color: white;
         border: none;
        padding: 5px 10px;
         border-radius: 6px;
        cursor: pointer;
        }

button.cancel-btn:hover {
    background-color: #d1283b;
}

        /* Responsive */
        @media (max-width: 720px) {
            table, thead, tbody, tr, th, td {
                display: block;
                width: 100%;
            }
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr {
                margin-bottom: 12px;
                border-radius: 10px;
                border: 2px solid #bfa14b;
                box-shadow: 0 6px 14px rgba(191, 161, 75, 0.25);
                background: #fffbea;
                padding: 14px 10px;
            }
            td {
                border: none;
                padding-left: 50%;
                position: relative;
                text-align: left;
                font-weight: 600;
                margin-bottom: 8px;
            }
            td::before {
                position: absolute;
                left: 15px;
                top: 12px;
                white-space: nowrap;
                font-weight: 700;
                color: #a1863c;
            }
            td:nth-of-type(1)::before { content: "Order ID"; }
            td:nth-of-type(2)::before { content: "Customer NIC"; }
            td:nth-of-type(3)::before { content: "Name"; }
            td:nth-of-type(4)::before { content: "Email"; }
            td:nth-of-type(5)::before { content: "Room ID"; }
            td:nth-of-type(6)::before { content: "Room Name"; }
            td:nth-of-type(7)::before { content: "Check In"; }
            td:nth-of-type(8)::before { content: "Check Out"; }
            td:nth-of-type(9)::before { content: "Created At"; }
        }
    </style>
</head>
<body>

<h2>Booking Orders</h2>

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer NIC</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Room ID</th>
            <th>Room Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Created At</th>
            <th>Confirmed</th>
            <th>Cancel</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nic']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['room_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['room_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['check_in']) . "</td>";
                echo "<td>" . htmlspecialchars($row['check_out']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "<td><input type='checkbox' name='confirmed_orders[]' value='" . intval($row['order_id']) . "'></td>";
                echo "<td>
                <form method='POST' action='delete_booking.php' onsubmit='return confirm(\"Are you sure to cancel this booking?\");'>
                    <input type='hidden' name='order_id' value='" . intval($row['order_id']) . "'>
                    <button type='submit' class='cancel-btn'>Cancel</button>
                </form>
                 </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10' style='text-align:center; padding: 20px; color:#a1863c;'>No booking data found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<button onclick="location.href='adminmgmt.php';">Go to Admin Management</button>
<button onclick="location.href='logout.php';">Logout</button>

</body>
</html>

<?php $conn->close(); ?>
