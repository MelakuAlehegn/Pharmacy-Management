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
    <section>
        <div>
            <h1>Fill the form below</h1>
        </div>
        <div>
            <form action="customer.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="name" value="" placeholder="Name"><br>
                    <input type="int" name="age" value="" placeholder="Age"><br>
                    
                    <label>Gender</label>
                    <select name="gender">
                        <option class="op" value="male">Male</option>
                        <option class="op" value="female">Female</option><br>
                    </select>

                    <input type="int" name="phone" value="" placeholder ="Phone Number"><br>
                    <input type="text" name="drug" value="" placeholder="Drug Bought"><br>
                                      
                </div>
                
                <div>
                    <button type="submit" name="customerBtn">SUBMIT</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>