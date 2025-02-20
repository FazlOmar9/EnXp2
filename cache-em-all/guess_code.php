<?php
session_start();

// Ensure the user is logged in and "saitama" is cached
if (!isset($_SESSION['loggedin_user']) || !file_exists("cache/saitama.cache")) {
    http_response_code(401);
    echo "Unauthorized access!";
    exit();
}

// Generate a random 2-digit code
$correct_code = 57;

if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['code'])) {
    $guessed_code = $_POST['code'];

    if ($guessed_code == $correct_code) {
        echo "EnXp{23P_9s1@d(ijdsf&(_SD-Psd}";
    } else {
        http_response_code(403); 
        echo "Incorrect. Try again.";
    }
}
?>

<!-- HTML form for guessing the code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess Code</title>
</head>
<body>

<h2>Guess the Code</h2>
<form method="POST">
    <label for="code">Enter 2-digit Code:</label>
    <input type="number" id="code" name="code" min="10" max="99" required><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
