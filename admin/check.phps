<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <?php
    // Function to verify password
    function verify_password($username, $password){
    $sql="SELECT name, password FROM cutefox WHERE name='$username'";
    $response = mysqli_query($conn, $sql);
    if($response){
        $row = mysqli_fetch_assoc($response);
        $db_password = substr($row['password'], 0, -3);
        if($db_password == $password){
            echo "Logged in successfully";
            display_flag();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "Data retrieval failed";
    }
}
    ?>

    <form action="signup.php" method="POST">
        <input type='text' placeholder='username' name='username' required>
        <br>
        <input type="password" placeholder="password" name="password" required>
        <br>
        <button>Submit</button>
        <br>
    </form>

</body>
</html>