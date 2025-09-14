<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

include 'db.php';

$errors = [
    'customer' => '',
    'room' => '',
    'vehicle' => ''
];

// Handle POST submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ADD CUSTOMER
    if (isset($_POST['add_customer'])) {
        $nic = trim($_POST['nic']);
        $name = trim($_POST['name']);
        $phone = trim($_POST['phone']);

        if ($nic === '' || $name === '' || $phone === '') {
            $errors['customer'] = "All fields are required for Customer.";
        } else {
            // Check duplicate NIC
            $checkStmt = $conn->prepare("SELECT nic FROM customers WHERE nic = ?");
            $checkStmt->bind_param("s", $nic);
            $checkStmt->execute();
            $checkStmt->store_result();
            if ($checkStmt->num_rows > 0) {
                $errors['customer'] = "Error: NIC already exists.";
                $checkStmt->close();
            } else {
                $checkStmt->close();
                $stmt = $conn->prepare("INSERT INTO customers (nic, name, phone) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $nic, $name, $phone);
                if (!$stmt->execute()) {
                    $errors['customer'] = "Error adding customer: " . $stmt->error;
                }
                $stmt->close();
            }
        }

        if ($errors['customer'] === '') {
            header("Location: adminmgmt.php?tab=customer");
            exit;
        }
    }

    // ADD ROOM
    if (isset($_POST['add_room'])) {
        $id = trim($_POST['room_id']);
        $name = trim($_POST['room_name']);

        if ($id === '' || $name === '') {
            $errors['room'] = "All fields are required for Room.";
        } else {
            $stmt = $conn->prepare("INSERT INTO rooms (id, name) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $name);
            if (!$stmt->execute()) {
                $errors['room'] = "Error adding room: " . $stmt->error;
            }
            $stmt->close();
        }

        if ($errors['room'] === '') {
            header("Location: adminmgmt.php?tab=rooms");
            exit;
        }
    }

    // ADD VEHICLE
    if (isset($_POST['add_vehicle'])) {
        $id = trim($_POST['vehicle_id']);
        $name = trim($_POST['vehicle_name']);
        $owner_name = trim($_POST['owner_name']);
        $telephone = trim($_POST['telephone']);

        if ($id === '' || $name === '' || $owner_name === '' || $telephone === '') {
            $errors['vehicle'] = "All fields are required for Vehicle.";
        } else {
            $stmt = $conn->prepare("INSERT INTO vehicles (id, name, owner_name, telephone) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $id, $name, $owner_name, $telephone);
            if (!$stmt->execute()) {
                $errors['vehicle'] = "Error adding vehicle: " . $stmt->error;
            }
            $stmt->close();
        }

        if ($errors['vehicle'] === '') {
            header("Location: adminmgmt.php?tab=vehicle");
            exit;
        }
    }

    // DELETE HANDLING
    if (isset($_POST['delete_nic'])) {
        $stmt = $conn->prepare("DELETE FROM customers WHERE nic = ?");
        $stmt->bind_param("s", $_POST['delete_nic']);
        $stmt->execute();
        $stmt->close();
        header('Location: adminmgmt.php?tab=customer');
        exit;
    }
    if (isset($_POST['delete_room_id'])) {
        $stmt = $conn->prepare("DELETE FROM rooms WHERE id = ?");
        $stmt->bind_param("s", $_POST['delete_room_id']);
        $stmt->execute();
        $stmt->close();
        header('Location: adminmgmt.php?tab=rooms');
        exit;
    }
    if (isset($_POST['delete_vehicle_id'])) {
        $stmt = $conn->prepare("DELETE FROM vehicles WHERE id = ?");
        $stmt->bind_param("s", $_POST['delete_vehicle_id']);
        $stmt->execute();
        $stmt->close();
        header('Location: adminmgmt.php?tab=vehicle');
        exit;
    }
}

// Fetch data for tabs
$customers = $conn->query("SELECT nic, name, phone FROM customers ORDER BY name");
$rooms = $conn->query("SELECT id, name FROM rooms ORDER BY id");
$vehicles = $conn->query("SELECT id, name, owner_name, telephone FROM vehicles ORDER BY id");

// Determine active tab from GET or default
$activeTab = $_GET['tab'] ?? 'customer';
if (!in_array($activeTab, ['customer', 'rooms', 'vehicle'])) {
    $activeTab = 'customer';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Management</title>
<style>
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
       margin-bottom: 10px;
   }
   .tabs {
       display: flex;
       border-bottom: 2px solid #bfa14b;
       margin-bottom: 20px;
   }
   .tab {
       padding: 10px 20px;
       cursor: pointer;
       border: 2px solid transparent;
       border-bottom: none;
       color: #bfa14b;
       font-weight: 700;
       user-select: none;
       transition: background-color 0.3s ease, border-color 0.3s ease;
   }
   .tab.active {
       background-color: #f5f0d6;
       border-color: #bfa14b;
       border-bottom: 2px solid #fff;
   }
   .tab-content {
       display: none;
   }
   .tab-content.active {
       display: block;
   }
   form {
       margin-bottom: 20px;
       border: 2px solid #bfa14b;
       padding: 15px;
       border-radius: 8px;
       max-width: 600px;
       background: #fffbea;
   }
   label {
       display: block;
       margin-bottom: 6px;
       font-weight: 600;
   }
   input[type="text"],
   input[type="tel"] {
       padding: 8px;
       width: 100%;
       margin-bottom: 12px;
       border: 1.5px solid #bfa14b;
       border-radius: 6px;
       font-size: 1rem;
       color: #5a4d32;
   }
   button {
       background-color: #bfa14b;
       color: white;
       border: none;
       padding: 10px 25px;
       font-weight: 700;
       border-radius: 8px;
       cursor: pointer;
       transition: background-color 0.3s ease;
   }
   button:hover {
       background-color: #d4b75a;
   }
   table {
       width: 100%;
       border-collapse: collapse;
       max-width: 900px;
   }
   th, td {
       padding: 12px 15px;
       text-align: left;
       border-bottom: 1px solid #eee;
       color: #5a4d32;
   }
   th {
       background-color: #f5f0d6;
       font-weight: 700;
   }
   tr:hover {
       background-color: #fffbea;
   }
   .btn-delete {
       background-color: #b00020;
       padding: 5px 12px;
       border-radius: 6px;
       color: white;
       font-weight: 600;
       text-decoration: none;
       cursor: pointer;
       border: none;
       transition: background-color 0.3s ease;
   }
   .btn-delete:hover {
       background-color: #d1283b;
   }
   .button-container {
       text-align: right;
       margin-bottom: 15px;
   }
   .button-container button, .button-container a {
       margin-left: 10px;
   }
   .error-message {
       color: #b00020;
       font-weight: 700;
       margin-bottom: 12px;
   }
</style>
</head>
<body>

<h2>Admin Management</h2>

<div class="button-container">
    <button onclick="location.href='orders_dashboard.php';">View Orders Dashboard</button>
    <a href="logout.php">Logout</a>
</div>

<div class="tabs">
    <div class="tab <?= $activeTab === 'customer' ? 'active' : '' ?>" data-tab="customer">Customer</div>
    <div class="tab <?= $activeTab === 'rooms' ? 'active' : '' ?>" data-tab="rooms">Rooms</div>
    <div class="tab <?= $activeTab === 'vehicle' ? 'active' : '' ?>" data-tab="vehicle">Vehicle</div>
</div>

<!-- Customer Tab -->
<div class="tab-content <?= $activeTab === 'customer' ? 'active' : '' ?>" id="customer">
    <h3>Add Customer</h3>
    <?php if ($errors['customer']): ?>
        <div class="error-message"><?= htmlspecialchars($errors['customer']) ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="add_customer" value="1">
        <label for="nic">NIC</label>
        <input type="text" id="nic" name="nic" maxlength="20" required />
        <label for="name">Name</label>
        <input type="text" id="name" name="name" maxlength="100" required />
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" maxlength="20" required />
        <button type="submit">Add Customer</button>
    </form>

    <h3>Customer List</h3>
    <table>
        <thead>
            <tr>
                <th>NIC</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $customers->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nic']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td>
                    <form method="POST" onsubmit="return confirm('Delete this customer?');" style="display:inline;">
                        <input type="hidden" name="delete_nic" value="<?= htmlspecialchars($row['nic']) ?>">
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Rooms Tab -->
<div class="tab-content <?= $activeTab === 'rooms' ? 'active' : '' ?>" id="rooms">
    <h3>Add Room</h3>
    <?php if ($errors['room']): ?>
        <div class="error-message"><?= htmlspecialchars($errors['room']) ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="add_room" value="1">
        <label for="room_id">Room ID</label>
        <input type="text" id="room_id" name="room_id" maxlength="20" required />
        <label for="room_name">Room Name</label>
        <input type="text" id="room_name" name="room_name" maxlength="100" required />
        <button type="submit">Add Room</button>
    </form>

    <h3>Room List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $rooms->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <form method="POST" onsubmit="return confirm('Delete this room?');" style="display:inline;">
                        <input type="hidden" name="delete_room_id" value="<?= htmlspecialchars($row['id']) ?>">
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Vehicle Tab -->
<div class="tab-content <?= $activeTab === 'vehicle' ? 'active' : '' ?>" id="vehicle">
    <h3>Add Vehicle</h3>
    <?php if ($errors['vehicle']): ?>
        <div class="error-message"><?= htmlspecialchars($errors['vehicle']) ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="add_vehicle" value="1">
        <label for="vehicle_id">Vehicle ID</label>
        <input type="text" id="vehicle_id" name="vehicle_id" maxlength="20" required />
        <label for="vehicle_name">Vehicle Name</label>
        <input type="text" id="vehicle_name" name="vehicle_name" maxlength="100" required />
        <label for="owner_name">Owner Name</label>
        <input type="text" id="owner_name" name="owner_name" maxlength="100" required />
        <label for="telephone">Telephone</label>
        <input type="tel" id="telephone" name="telephone" maxlength="20" required />
        <button type="submit">Add Vehicle</button>
    </form>

    <h3>Vehicle List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Owner Name</th>
                <th>Telephone</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $vehicles->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['owner_name']) ?></td>
                <td><?= htmlspecialchars($row['telephone']) ?></td>
                <td>
                    <form method="POST" onsubmit="return confirm('Delete this vehicle?');" style="display:inline;">
                        <input type="hidden" name="delete_vehicle_id" value="<?= htmlspecialchars($row['id']) ?>">
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.tab-content');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const target = tab.dataset.tab;
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById(target).classList.add('active');
        
        // Update URL param (optional)
        if(history.pushState) {
            const url = new URL(window.location);
            url.searchParams.set('tab', target);
            window.history.pushState({}, '', url);
        }
    });
});
</script>

</body>
</html>
