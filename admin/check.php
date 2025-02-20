<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINS</title>
</head>
<body>
    <?php
    
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "Alessandro" && $password=="p6lm1PLqXoP5lX0qG7"){
            echo "Welcome $username <br>";
            echo "Your Flag is: EnXp{sdU$9Z4se_I3_2W2*P@uq}";
        }
        else{
            echo "Wrong username or password";
        }
    } else {
        echo "Please enter both username and password.";
    }

    ?>
</body>
</html>