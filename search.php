<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$conn = mysqli_connect('localhost', 'root' , '',   'file-management');

$sql = "SELECT * FROM empty";
if (isset($_POST['dispDrugs'])) {
 $sql = "SELECT * FROM drugs"; 
}
$result = mysqli_query($conn, $sql);    
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['search'])) {
$searchName = $_POST['name'];
 
$sql = "SELECT * FROM drugs WHERE Dname LIKE '%$searchName%'";          
$result = mysqli_query($conn, $sql);    
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_POST['dispExpired'])) {
  echo "Today is " . date("d-m-Y");
  $sql = "SELECT * FROM drugs WHERE Edate < CURDATE()";          
  $result = mysqli_query($conn, $sql);    
  $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<?php include 'style1.css'?>
<!DOCTYPE html>
<html lang="en">
  <head> 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Search</title>

  
</head>

  <body>
    <section>
      <div class="container">
        
        <form class="dispClearBtns" action="search.php" method="post">
          <button class="clearBtn" type="submit" name="dispDrugs">Display All Drugs</button>
          <button type="submit" name="dispExpired">Display Expired Drugs</button>
          <button class="displayBtn" type="submit" name="displayAllCus"><a href="displayCustomers.php">Display All Customers</a></button>
          </form>
        
        <form class="searchId" action="search.php" method="post">
          <h4> Search Drug Name</h4>
          <input class="inputId" type="text" placeholder="" name="name" value="">
          <button class="idBtn" type="submit" name="search">Search</button>
        </form>
    </div>
<table class="list">
<thead>
  <tr>
    <th>ID</th>   
    <th>Drug Name</th>
    <th>Brand</th>
    <th>Expiry Date</th>
    <th>Quantity</th>
    <!-- <th>Action</th> -->
  </tr>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['Id']; ?></td>      
      <td><?php echo $file['Dname']; ?></td>
      <td><?php echo $file['Brand']; ?></td>
      <td><?php echo $file['Edate']; ?></td>
      <td><?php echo $file['Quant']; ?></td>
      <!-- <td><a href="search.php?file_name=<?php echo $file['id'] ?>">Sell 1</a></td> -->
    </tr>
  <?php endforeach;?>
</tbody>
</table>
</section>
  </body>
</html>