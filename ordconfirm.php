<?php include('server.php')?>

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
         
                <form action="search.php" method="POST">
                <div class="rightNav">
                    <input type="text" name="search" id="search">
                    <button id="myButton" class="float-left submit-button" >SEARCH</button>
                    
                </div>
              </form>
            </nav> 
    </body>
</html>

<?php
$fname=$_SESSION['fname'];
$hno=$_POST['hno'];
$street=$_POST['street'];
$city=$_POST['city'];
$province=$_POST['province'];
$state=$_POST['state'];

$sql1 = "SELECT custid FROM customers WHERE FirstName='$fname'";
$result = $conn->query($sql1);
 foreach($result as $row) {
    $row['custid'];
   echo "<br>";
 }
$custid=$row['custid'];
$sql10 = "SELECT cartid FROM cart WHERE custid='$custid'";
$result = $conn->query($sql10);
 foreach($result as $row) {
    $row['cartid'];
   echo "<br>";
 }
$cartid=$row['cartid'];

$sql2 = "insert into address(houseno,street,custid) values ('$hno','$street','$custid')";
if ($conn->query($sql2) === TRUE) {
  //echo "<h3>New record created successfully in address table</h3><br>";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "insert into city(cityname) values ('$city')";
if ($conn->query($sql3) === TRUE) {
  //echo "<h3>New record created successfully in city table</h3><br>";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}

$sql4 = "insert into province(proname) values ('$province')";
if ($conn->query($sql4) === TRUE) {
  //echo "<h3>New record created successfully in province table</h3><br>";
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}

$sql5 = "insert into state(statename) values ('$state')";
if ($conn->query($sql5) === TRUE) {
  //echo "<h3>New record created successfully in state table</h3><br>";
} else {
  echo "Error: " . $sql5 . "<br>" . $conn->error;
}
$sql7 = "SELECT addressid from address WHERE custid='$custid'";
$result7 = $conn->query($sql7);
 foreach($result7 as $row) {
   $row['addressid'];
   //echo "<br>";
 }
$addressid=$row['addressid'];
//$sql11="SELECT vendorproductid from cartproduct where cartid = '$cartid'";
// $sharon="SELECT vendorproductid from cartproduct where cartid = '$cartid'";
// $ressha=$conn->query($sharon);
// foreach($ressha as $row){
  
// }
$sql6="insert into orders(custid,orderdt,addressid) values ('$custid',NOW(),'$addressid')";
if($conn->query($sql6)==TRUE){
   //echo "<h3>New record created successfully in orders table</h3><br>";
} else {
  echo "Error: " . $sql6 . "<br>" . $conn->error;
}
$sql12="SELECT orderid from orders where custid='$custid'";
$result12 = $conn->query($sql12);
 foreach($result12 as $row) {
   $row['orderid'];
   //echo "<br>";
 }
 $orderid=$row['orderid'];
$sql8= "SELECT vendorproductid from orderedprod where vendorproductid in 
(SELECT vendorproductid from cartproduct where cartid = '$cartid')";
$result8=$conn->query($sql8);
foreach($result8 as $row){
  //echo $row['vendorproductid'];
  $vendorproductid = $row['vendorproductid'];
  $sql9="insert into orderedproducts (vendorproductid,orderid,quantity) values ('$vendorproductid','$orderid',1)";
  if($conn->query($sql9)==TRUE){
    //echo "NEw record inserted in ordered products table<br>";
  }
  
  $sql13 = "DELETE FROM cartproduct WHERE vendorproductid='$vendorproductid'";
  if($conn->query($sql13)==TRUE){
    //echo "Record deleted from cartproduct<br>";
  }
  $sql14="CALL earnings();";
  if($conn->query($sql14)==TRUE){
    //echo "Earnings table updated<br>";
  };

}
echo ("<script> window.alert('ORDER PLACED. THANK YOU :)') ;
       window.location.href='orders.php' </script>");

// $sql6="insert into orders(custid,orderdt,addressid) values ('$custid',NOW(),'$addressid')";
// if($conn->query($sql6)==TRUE){
//    echo "<h3>New record created successfully in orders table</h3><br>";
// } else {
//   echo "Error: " . $sql6 . "<br>" . $conn->error;
// }

//$sql9="insert into orderedproducts (vendorproductid,orderid,quantity) values ("

?>

<html>
    <h1>THANK YOU!!</h1>
    
    </html>