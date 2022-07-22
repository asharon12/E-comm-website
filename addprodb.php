<?php include('server.php');?> 
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="prodstyle.css">
    </head>
   <body>
            <nav class="navbar background">
                <ul class="nav-list">
                    <div class="logo">
                        <!-- <a href="venpage.php"> -->
                        <img src="logo.png">
                    </div>
                    <li><a href="venpage.php">Hello,<?php echo $_SESSION['vname']; ?> </a></li>
                    <li><a href="earnings.php">Earnings</a></li>
                        <li><a href="index.php">LOGOUT</a></li>
                </ul>
         
                <form action="searchven.php" method="POST">
                <div class="rightNav">
                    <input type="text" name="search" id="search">
                    <button id="myButton" class="float-left submit-button" >SEARCH</button>
                    
                </div>
              </form>
            </nav> 
    </body>
</html>

<?php 

//session_start();
$productname=$_POST['productname'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$desc = $_POST['desc'];
$categoryid = $_POST['categoryid'];
$vendorid=$_POST['vendorid'];
//$couriername=$_POST['couriername'];
//$couriername=$_POST['couriername'];
//$vendorid = $_POST['vendorid'];
//$vendorid=$_POST['vendorid'];

// $sql="SELECT categoryid from category WHERE categoryname='$categoryname'";
// $result = $conn->query($sql);

$sql="INSERT into product (productname,categoryid) values ('$productname','$categoryid')";

if ($conn->query($sql) === TRUE) {
  //echo "<h3>New record created successfully in product table</h3><br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql1="SELECT productid from product where productname='$productname'";
$result=$conn->query($sql1);
foreach($result as $row) {
  // echo "Categoryid:".$row['categoryid'];
//    $_SESSION['categoryid']=$row['categoryid'];
}
$productid=$row['productid'];
//$vendorid=$_SESSION['vendorid'];

$sql2="INSERT INTO vendorproduct (vendorid,productid,price,quantity,descr) values ('$vendorid','$productid','$price','$quantity','$desc')";

if ($conn->query($sql2) === TRUE) {
  //echo "<h3>New record created successfully in vendorproduct table</h3><br>";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$sql4="SELECT vendorproductid from vendorproduct where vendorid='$vendorid' and productid='$productid'";
$result4=$conn->query($sql4);
foreach($result4 as $row){
 // echo $row['vendorproductid'];
  $vendorproductid=$row['vendorproductid'];
}

$sql3="INSERT into earnings (vendorid,earning,vendorproductid) values ('$vendorid',0,'$vendorproductid')";
if($conn->query($sql3)==TRUE){
  //echo "<h3>New record created successfully in earnings table</h3><br>";
  
}
else{
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
echo ("<script> window.alert('UPLOADED PRODUCT SUCCESSFULLY') ;
       window.location.href='venpage.php' </script>");

?> 

