<?php
session_start();

// Include users list
include 'users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if "saitama" is already cached and username is "saitama"
    if (file_exists("cache/saitama.cache") && $username === "saitama") {
        $_SESSION['loggedin_user'] = $username;
        header("Location: guess_code.php");
        exit();
    }

    // Check if the username and password match
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['loggedin_user'] = $username;

        // Set or update the verify cookie
        $verify = isset($_COOKIE['verify']) ? $_COOKIE['verify'] : $username;
        setcookie("verify", $verify, time() + 3600, "/");

        // If the verify value is "saitama", cache it
        if ($verify === "saitama") {
            file_put_contents("cache/saitama.cache", $verify);
        }

        // Cache the user
        file_put_contents("cache/$username.cache", $username);

        header("Location: welcome.php");
        exit();
    }

    // If username and password don't match, check if user is in cache (except for "saitama")
    if ($username !== "saitama") {
        $cache_file = "cache/$username.cache";
        if (file_exists($cache_file)) {
            $_SESSION['loggedin_user'] = $username;
            header("Location: welcome.php");
            exit();
        }
    }

    // If not in cache and password doesn't match, show error
    echo "Invalid username or password.";
}
else{
    echo "error";
}