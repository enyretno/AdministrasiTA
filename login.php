<?php
// Start session
session_start();

// Dummy data for demonstration (usually fetched from a database)
$users = [
  'admin' => 'password123',
  'user' => 'userpass',
];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate login credentials
  if (isset($users[$username]) && $users[$username] === $password) {
    // Set session
    $_SESSION['username'] = $username;
    header('Location: dashboard.php'); // Redirect to dashboard or home page
    exit;
  } else {
    $error = 'Invalid username or password';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Result</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .result-container {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
  }

  .result-container h1 {
    margin-bottom: 20px;
    font-size: 1.5rem;
    color: #333;
  }

  .result-container p {
    color: #666;
    font-size: 1rem;
  }

  .back-link {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    color: #007BFF;
    font-size: 0.9rem;
  }

  .back-link:hover {
    color: #0056b3;
  }
  </style>
</head>

<body>
  <div class="result-container">
    <?php if (isset($error)): ?>
    <h1>Login Failed</h1>
    <p><?php echo $error; ?></p>
    <?php else: ?>
    <h1>Login Successful</h1>
    <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
    <?php endif; ?>
    <a href="index.html" class="back-link">Go back to Login</a>
  </div>
</body>

</html>