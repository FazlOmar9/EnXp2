<?php
session_start();
// Ensure user is logged in
if (!isset($_SESSION['loggedin_user'])) {
    echo "Unauthorized access!";
    exit();
}
$logged_in_user = $_SESSION['loggedin_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($logged_in_user); ?>!</h2>
<p>You are logged in successfully.</p>

<!-- Logout Button -->
<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>

</body>
</html>