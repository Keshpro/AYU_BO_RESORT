<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Simple hardcoded check for example, replace with DB user check if needed
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: orders_dashboard.php");
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Login</title>
    <style>
        /* Reset & base */
        * {
            box-sizing: border-box;
        }
        body {
       margin: 0;
       padding: 0;
       background-image: url('assets/destination/kaudulla-safari-elephants-scaled.webp'); /* Replace with your image path */
       background-size: cover;      /* Make the background cover whole screen */
       background-position: center; /* Center the image */
       background-repeat: no-repeat; /* Prevent tiled background */
       background-attachment: fixed; /* Fix the background during scroll */
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       }
       .login-container {
    background: rgba(255, 255, 255, 0.85); /* White background with some opacity */
    padding: 30px;
    max-width: 400px;
    margin: 100px auto;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  }
        .login-container h2 {
            margin-bottom: 30px;
            font-weight: 700;
            color: #bfa14b;
            letter-spacing: 1px;
            font-size: 1.9rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }
        label {
            font-weight: 600;
            margin-bottom: 6px;
            text-align: left;
            color: #a1863c;
        }
        input[type="text"],
        input[type="password"] {
            padding: 12px 15px;
            border-radius: 8px;
            border: 2px solid #bfa14b;
            font-size: 1rem;
            outline: none;
            color: #5a4d32;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #d4b75a;
            box-shadow: 0 0 8px #d4b75a88;
        }
        button {
            background-color: #bfa14b;
            color: #fff;
            font-weight: 700;
            padding: 14px 0;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            letter-spacing: 0.1em;
        }
        button:hover {
            background-color: #d4b75a;
        }
        .error-message {
            color: #b00020;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Admin Login</h2>
    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required autocomplete="off" />
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required autocomplete="new-password" />
        
        <button type="submit">Login</button>
    </form>
    <p style="text-align: center; margin-top: 20px;">
  <a href="index.php" style="
    color: #bfa14b;
    font-weight: 700;
    text-decoration: none;
    border: 2px solid #bfa14b;
    padding: 8px 16px;
    border-radius: 8px;
    display: inline-block;
    transition: background-color 0.3s ease;
  " 
  onmouseover="this.style.backgroundColor='#bfa14b'; this.style.color='white';" 
  onmouseout="this.style.backgroundColor='transparent'; this.style.color='#bfa14b';">
    Back to Home Page
  </a>
</p>

</div>

</body>
</html>

