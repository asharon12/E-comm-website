<?php include('server.php')?> 

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="prodstyle.css">
    </head>
   <style>
       body {
        background: linear-gradient(rgba(0, 0, 25, 0.5), rgba(0, 0, 25, 0.5));
        background-image: url('https://cdn.pixabay.com/photo/2014/01/23/21/35/pink-250777__340.jpg');
        background-size:100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
    div.disp {
    padding: 15px;
    margin-left: 100px;
    text-align: center;
    border: 2px;
    width: 300px;
    text-align: center;
}
.button {
  background-color: #990066;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}
    </style>
   <body>
            <nav class="navbar background">
                <ul class="nav-list">
                    <div class="logo">
                        <img src="logo.png">
                    </div>
                    <li><a href="custpage.php">Hello,<?php echo $_SESSION['fname'];?></a></li>
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
echo '<div class="disp">';
$sql = "SELECT productname,price,descr,productid,quantity FROM productdisplay WHERE categoryid IN (SELECT categoryid FROM category 
        WHERE categoryname='Cloths')";
$result = $conn->query($sql);
$product = array();
foreach($result as $row){
    $product[] = array(
        'productname' => $row['productname'],
        'price' => $row['price'],
        'descr' => $row['descr'],
        'productid' => $row['productid'],
        'quantity'=> $row['quantity']);
        if($row['quantity']<=0){
            
        }
        else{
        echo "<form action='cart.php' method='POST'><br>";
   echo "<br>";
   echo "<div class='desc'>PRODUCT NAME:".$row['productname']."<br>PRICE:".$row['price']."<br>DESCRIPTION:".$row['descr']."<br>";
   echo "<input id='productid' name='productid' value='$row[productid]' type='hidden' ></input>";
  // echo "<input id='particic' name='partici' type='hidden' value=$fname></input>";
   echo "<button type='submit' class='button'>ADD TO CART</button></div>";
   echo "<td>";
   echo "</form>";
        }

echo "<td>";
}
 echo "</div>";
?>