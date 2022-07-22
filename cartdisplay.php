<?php include('server.php');
?>
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
  background-color: #f4511e;
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
        <body>
            <nav class="navbar background">
                <ul class="nav-list">
                    <div class="logo">
                        <img src="logo.png">
                    </div>
                    <li><a href="custpage.php">Hello,<?php echo $_SESSION['fname']; ?> </a></li>
                    <li><a href="orders.php">Orders</a></li>
                    <li><a href="cartdisplay.php">Cart</a></li>
                    <li><a href="index.php">LOGOUT</a></li>
                </ul>
              <form action="search.php" method="POST">
                <div class="rightNav">
                    <input type="text" name="search" id="search">
                    <button id="myButton" class="float-left submit-button">SEARCH</button>
                    
                </div>
              </form>
            </nav>
                </body>
</html>

<?php
echo '<div class="disp">';
$fname= $_SESSION['fname'];
$sql1 = "SELECT custid FROM customers WHERE firstname='$fname'";
$result = $conn->query($sql1);
while($row = $result->fetch_assoc()){
  $custid=$row['custid'];
  //echo $custid;
}
//echo '<br>';

$sql2 = "SELECT cartid FROM cart WHERE custid='$custid'";
$result = $conn->query($sql2);
while($row = $result->fetch_assoc()){
  $cartid=$row['cartid'];
//   echo $cartid;
}

//echo '<br>';

$sql3 = "SELECT vendorproductid FROM cartproduct WHERE cartid='$cartid'";
$result = $conn->query($sql3);
while($row = $result->fetch_assoc()){
  $vendorproductid=$row['vendorproductid'];
  //echo $vendorproductid;
  //echo '<br>';
}

$sql4 = "SELECT productid FROM vendorproduct WHERE vendorproductid IN (SELECT vendorproductid FROM cartproduct WHERE cartid='$cartid')";
$result = $conn->query($sql4);
while($row = $result->fetch_assoc()){
  $productid=$row['productid'];
    //echo $productid;
//   echo '<br>';
}

$sql5 = "SELECT productname,price FROM cartdisplay WHERE productid IN (SELECT productid FROM vendorproduct WHERE vendorproductid IN 
(SELECT vendorproductid FROM cartproduct WHERE cartid='$cartid'))";
$result = $conn->query($sql5);
$productname = array();
if($result->num_rows > 0){
foreach($result as $row){
  $product[] = array(
        'productname' => $row['productname'],
        'price' => $row['price'] );
        echo "<br>";
        // 'descr' => $row['descr'],
        // 'productid' => $row['productid']
        echo "<div class='desc' >PRODUCT NAME:".$row['productname']."<br>PRICE:".$row['price']." </div>";
        echo "<br>";
}
}
else{
  echo "<br><br><h3>Add items to view cart</h3><br>";
}
echo '<br>';
echo "</div>";
if($result->num_rows > 0){
  echo 
"<div class='disp'>
<form action='address.php' method='POST'>
    <button id='myButton' class='button' >PLACE ORDER</button>
</form>
</div>";
echo
"<div class='disp'>
<form action='clearcart.php' method='POST'>
    <button id='myButton' class='button' >CLEAR CART</button>
</form>
</div>";
}
echo '<div class="disp">';
echo "<h3>MOST SOLD ITEMS</h3><br>";
$sql1="SELECT vendorproductid,vendorid from vendorproduct WHERE vendorproductid IN (SELECT vendorproductid FROM highsold group by vendorproductid
HAVING count(vendorproductid)>=3 )";
// -- group by vendorproductid
// -- order by count(vendorproductid) desc)
$result1=$conn->query($sql1);
foreach($result1 as $row){

  $vendorproductid=$row['vendorproductid'];
  echo "<br>";
  // echo $row['vendorid'];
  $vendorid=$row['vendorid'];
  $sql2 = "select vendorname from vendor where vendorid='$vendorid' ";
  $result2=$conn->query($sql2);
  foreach($result2 as $row){
    $vendorname=$row['vendorname'];
    echo "VENDOR NAME: ";
    echo $vendorname;
    echo "<br>";
  }

  $sql3 = "select productname from product where productid = (select productid from vendorproduct where vendorproductid='$vendorproductid')";
  $result3=$conn->query($sql3);
foreach($result3 as $row){
  $productname=$row['productname'];
  echo "PRODUCT NAME: ";
  echo $productname;
}
  echo "<br>";
}


echo "</div>";
?>