<?php include('server.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="prodstyle.css">
    </head>
   <body>
            <nav class="navbar background">
                <ul class="nav-list">
                    <div class="logo">
                        <img src="logo.png">
                    </div>
                    <li><a href="custpage.php">Hello, <?php echo $_SESSION['fname']; ?></a></li>
                    <li><a href="orders.php">Orders</a></li>
                    <li><a href="cartdisplay.php">Cart</a></li>
                    <li><a href="index.php">LOGOUT</a></li>
                </ul>
         
                <div class="rightNav">
                    <input type="text" name="search" id="search">
                    <button class="btn btn-sm">Search</button>
                </div>
            </nav> 
    </body>
</html>
<?php 

//echo $_SESSION['fname'];
?>

<form action='cart.php' method='POST'>
    <label for='productid' >Enter productid to add to cart:</label>
    <input id='productid' name='productid' type='text'></input>
    
</form>
