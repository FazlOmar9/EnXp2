<?php
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $database = "galaxy";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if (isset($_COOKIE['id']) || isset($_POST['pika']) ) {
        if (isset($_COOKIE['id'])) {
            $cookie_value = $_COOKIE['id'];
        } elseif (isset($_POST['pika'])) {
            $cookie_value = $_POST['pika'];
        }
        $pika=$_POST["pika"];

        $sql_query = "SELECT id FROM `cookie` WHERE id = '$pika'";
        $response = mysqli_query($conn, $sql_query);
        if(mysqli_num_rows($response) > 0){
            echo "Welcome back to our shop!! <br>";
            echo "Now please login to continue..<br>";
        } else {
            echo "Intruder<br>";
        }
    } else {
        echo "No cookie set<br>";
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    

    <form action="check.php" method="POST">
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>