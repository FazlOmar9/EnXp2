<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="foritem.css" rel="stylesheet" >
    <title>About items</title>
</head>

<body>
    <!-- First column is tablename, second is col1 which contains the name of the column of the table and Third is col2 which contains the name of the another column of the table -->


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
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>  

    <form action="item.php" method="GET">
        Enter the item number to know its name:
        <input type="text" name="number" placeholder="Item no.">
        <button>Submit</button>
    </form>
    <br>
    
    <?php
    $servername="127.0.0.1:3306";
    $username="root";
    $password="";
    $database="item";
    
    $conn = mysqli_connect("$servername", "$username", "$password", "$database");
    if(!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["number"])){
            echo "ABOUT Item<br>";
            
        $number=$_GET["number"];
        
        $sql="SELECT * FROM item WHERE sno='$number'";
        $response = mysqli_query($conn, $sql);
        if (!$response) {
            echo "Error!! Something went wrong";
        } else {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Col1</th>
                        <th>Col2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($response)){ ?>
                    <tr>
                        <td><?php echo $row['sno']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['col1']; ?></td>
                        <td><?php echo $row['col2']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        }
        
        
        }
    ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>