<?php
    $cookie_value='erF1gPd71et6V';
    setcookie("id", $cookie_value, time()+ 86400, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="forindex.css">
    <title>Shop</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">EnigmaXplore</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="item.php">Item</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Signup</a>
        </li>
      </ul>
      <form class="d-flex align-items-center" action="login.php" method="POST">

    <input type="hidden" name="pika" value="<?php echo $cookie_value; ?>">
    <input type="text" name="dummy" style="display:none;" disabled>
    <button class="btn btn-outline-success ms-2" type="submit">Login</button>
    </form>
    </div>
  </div>
</nav>    

<form action="index.php" method="GET" id="myForm">
    <button name="n" value="Furniture">Furniture</button>
    <button name="n" value="Home Decor">Home Decor</button>
    <button name="n" value="Electronics">Electronics</button>
    <button name="n" value="Kitchen">Kitchen & Dining</button>
    <button name="n" value="Sports">Sports & Fitness</button>
    <button name="n" value="Fashion">Fashion & Apparel</button>
</form>

<?php

if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["n"])){
        $n =$_GET["n"];   
        
        $servername="127.0.0.1:3306";
        $username="root";
        $password="";
        $database="void";
    
        $conn = mysqli_connect("$servername", "$username", "$password", "$database");
        if(!$conn){
            die("Connection failed: " .mysqli_connect_error());
        }
        $sql="SELECT * FROM items WHERE category = '$n'";
        $response = mysqli_query($conn, $sql);
        if (!$response) {
            echo "Error!! Something went wrong";
        } else {
          echo "<table border='1' cellpadding='10'>";
          echo "<tr><th>--Category--</th><th>--Price--</th><th>--Rating--</th></tr>";
          while($row=mysqli_fetch_assoc($response)){
              echo "<tr>";
              echo "<td>" . $row['category'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
              echo "<td>" . $row['rating'] . "</td>";
              echo "</tr>";
          };
          echo "</table>";
      }
    
    }
    
else{
    
    
    $servername="127.0.0.1:3306";
    $username="root";
    $password="";
    $database="void";
    
    $conn = mysqli_connect("$servername", "$username", "$password", "$database");
    if(!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

    $sql="SELECT * FROM items";
    $response = mysqli_query($conn, $sql);

    
  if (!$response) {
      echo "Error!! Something went wrong";
  } else {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>--Item name--</th><th>--Price--</th><th>--Rating--</th></tr>";
    while($row=mysqli_fetch_assoc($response)){
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    };
    echo "</table>";
}

}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


