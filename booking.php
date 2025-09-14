<?php
include 'db.php';

// Fetch rooms and vehicles for dropdowns
$rooms = $conn->query("SELECT id, name FROM rooms ORDER BY id");
$vehicles = $conn->query("SELECT id, name FROM vehicles ORDER BY id");

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nic = trim($_POST['nic']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']); 
    $room_id = $_POST['room_id'] !== 'none' ? $_POST['room_id'] : null;
    $vehicle_id = $_POST['vehicle_id'] !== 'none' ? $_POST['vehicle_id'] : null;
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    if (!$room_id && !$vehicle_id) {
        $error = "Please select at least a room or a vehicle.";
    } else {
        // Insert customer if not exists (using phone, no email)
        $stmt = $conn->prepare("INSERT IGNORE INTO customers (nic, name, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nic, $name, $phone);  // replaced email with phone
        $stmt->execute();
        $stmt->close();

        // Insert order for room if selected
        if ($room_id) {
            $stmt = $conn->prepare("INSERT INTO orders (nic, room_id, check_in, check_out) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nic, $room_id, $check_in, $check_out);
            $stmt->execute();
            $stmt->close();
        }

        // Insert order for vehicle if selected
        if ($vehicle_id) {
            $stmt = $conn->prepare("INSERT INTO vehicle_orders (nic, vehicle_id, check_in, check_out) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nic, $vehicle_id, $check_in, $check_out);
            $stmt->execute();
            $stmt->close();
        }

        $success = "Booking placed successfully.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Form</title>
<style>
  body {
    margin: 0;
    padding: 0;
    background-image: url('assets/destination/minneriya1.webp');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .form-wrapper {
    background: rgba(255, 255, 255, 0.92);
    max-width: 450px;
    margin: 80px auto;
    padding: 30px 35px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(191, 161, 75, 0.3);
  }

  .form-wrapper h2 {
    text-align: center;
    color: #bfa14b;
    font-weight: 700;
    margin-bottom: 25px;
  }

  .form-group {
    margin-bottom: 18px;
  }

  label {
    display: block;
    font-weight: 700;
    color: #a1863c;
    margin-bottom: 6px;
  }

  input[type="text"],
  input[type="tel"],
  input[type="date"],
  select {
    width: 100%;
    padding: 13px 15px;
    border: 2px solid #bfa14b;
    border-radius: 8px;
    font-size: 1rem;
    color: #5a4d32;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input[type="text"]:focus,
  input[type="tel"]:focus,
  input[type="date"]:focus,
  select:focus {
    border-color: #d4b75a;
    box-shadow: 0 0 8px #d4b75a88;
  }

  button.book-now {
    width: 100%;
    background-color: #bfa14b;
    border: none;
    padding: 15px 0;
    font-weight: 700;
    font-size: 1.1rem;
    color: white;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 6px 16px rgba(191, 161, 75, 0.45);
    transition: background-color 0.3s ease;
  }

  button.book-now:hover {
    background-color: #d4b75a;
  }

  .button-group {
    display: flex;
    gap: 15px;
    margin-top: 15px;
  }

  .button-group button {
    flex: 1;
    padding: 12px 0;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
  }

  .button-group button.back-home {
    background-color: transparent;
    border: 2px solid #bfa14b;
    color: #bfa14b;
    box-shadow: none;
  }

  .button-group button.back-home:hover {
    background-color: #bfa14b;
    color: white;
    box-shadow: 0 6px 16px rgba(191, 161, 75, 0.45);
  }

  .button-group button.contact-us {
    background-color: transparent;
    border: 2px solid #ff833bff;
    color: #ff833bff;
    box-shadow: none;
  }

  .button-group button.contact-us:hover {
    background-color: #ff833bff;
    color: white;
    box-shadow: 0 6px 16px rgba(255, 131, 59, 0.6);
  }

  /* Responsive */
  @media (max-width: 480px) {
    .button-group {
      flex-direction: column;
    }
  }
</style>
</head>
<body>

<div class="form-wrapper">
  <h2>Place Your Booking</h2>
  <form method="POST" action="">

    <div class="form-group">
      <label for="nic">Customer NIC</label>
      <input type="text" id="nic" name="nic" required maxlength="20" placeholder="Enter NIC" />
    </div>

    <div class="form-group">
      <label for="name">Customer Name</label>
      <input type="text" id="name" name="name" required maxlength="100" placeholder="Enter full name" />
    </div>

    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" maxlength="20" placeholder="Enter phone number" />
    </div>

    <div class="form-group">
      <label for="room_id">Select Room (optional)</label>
      <select name="room_id" id="room_id">
      <option value="none" selected>-- No Room Booking --</option>
  <!-- PHP populate options here -->
     <?php if ($rooms): ?>
     <?php while ($room = $rooms->fetch_assoc()): ?>
     <option value="<?= htmlspecialchars($room['id']) ?>"><?= htmlspecialchars($room['name']) ?></option>
     <?php endwhile; ?>
     <?php endif; ?>
     </select>
    </div>

    <div class="form-group">
      <label for="vehicle_id">Select Vehicle (optional)</label>
      <select name="vehicle_id" id="vehicle_id">
        <option value="none" selected>-- No Vehicle Booking --</option>
        <!-- PHP populate options here -->
         <?php if ($vehicles): ?>
      <?php while ($vehicle = $vehicles->fetch_assoc()): ?>
       <option value="<?= htmlspecialchars($vehicle['id']) ?>"><?= htmlspecialchars($vehicle['name']) ?></option>
      <?php endwhile; ?>
      <?php endif; ?>
      </select>
     </div>

    <div class="form-group">
      <label for="check_in">Check-in Date</label>
      <input type="date" id="check_in" name="check_in" required />
    </div>

    <div class="form-group">
      <label for="check_out">Check-out Date</label>
      <input type="date" id="check_out" name="check_out" required />
    </div>

    <button type="submit" class="book-now">Book Now</button>

    <div class="button-group">
      <button type="button" class="back-home" onclick="window.location.href='index.php';">Back to Home Page</button>
      <button type="button" class="contact-us" onclick="window.location.href='Contactus.php';">Contact Us</button>
    </div>
  </form>
</div>

</body>
</html>
