<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['index'] > 47){
            echo "Redirecting...";
        }
        else{
        $index = $_POST['index'];
        if($index==23){
            echo "YAY!! <br> This is your flag EnXp{wda_%ROp8_s2df_d}";
        }
        else{
        echo "Looks like you have found a valid cookie <br> But not the one you are looking for <br> Keep trying";
    }
    }
    }
else {
echo "Invalid request method.";
}
?>
