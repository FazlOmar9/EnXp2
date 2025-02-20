<?php
session_start();

if (isset($_SESSION['loggedin_user'])) {
    unset($_SESSION['loggedin_user']);
    session_destroy();
    $cacheDir = 'cache';
    if (is_dir($cacheDir)) {
        $files = glob($cacheDir . '/*');
        
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
    if (isset($_COOKIE)) {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, '', time() - 3600, '/');
        }
    }
    header("Location: index.php");
    exit();
} else {
    echo "You are not logged in.";
}
?>