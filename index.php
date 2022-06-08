<?php include 'handle.php';
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <section class="container">
        <div class="container-admin">
            <h1>Fill the form below</h1>
        </div>
        <div class="container form-login">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="container-inputs">
                    
                    <input type="text" name="first_name" value="" placeholder="Drug Name"><br>
                    <input type="text" name="last_name" value="" placeholder="Brand"><br>
                    <input type="date" name="id" value="" placeholder ="Expiry Date"><br>
                    <input type="int" name="sector" value="" placeholder="Quantity"><br>                    
                </div>
            </div>
                <div>
                    <button type="submit" name="save">SUBMIT</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>