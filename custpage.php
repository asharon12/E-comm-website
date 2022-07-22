<?php include('server.php');

// $sql = "CALL noofstocks()";
// $result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
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
                    <button id="myButton" class="float-left submit-button" >SEARCH</button>
                    
                </div>
              </form>
            </nav> 
   
<!-- <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "search.php";
    };
</script> -->

<head>
  
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
    margin-left: 150px;
    text-align: center;
    border: 2px;
    width: 300px;
    text-align: center;
}

div.gallery {
  margin-top: 70px;
  margin-left: 90px;
  margin-right: 70px;
  margin-bottom: 70px;
  border: 1px solid #ccc;
  float: left;
  width: auto;
  
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 300px;
  height: 300px;
}

div.desc {
  padding: 15px;
  text-align: center;
}

</style>
</head>

            <div class="gallery">
  <a  href="cloths.php">
    <img src="https://images.pexels.com/photos/996329/pexels-photo-996329.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Cloths" width="600">
  </a>
  <div class="desc"><h3>CLOTHS</h3></div>
</div>

<div class="gallery">
  <a  href="furniture.php">
    <img src="furniture.jpg" alt="Forest" width="600" >
  </a>
  <div class="desc"><h3>FURNITURE</h3></div>
</div>

<div class="gallery" >
  <a href="electronics.php">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7P165tR0oiVVXJuQUBKqq7_Hk2xsXq3dxHg&usqp=CAU" alt="Electronics" width="600" >
  </a>
  <div class="desc"><h3>ELECTRONICS</h3></div>
</div>

<div class="gallery">
  <a  href="stationary.php">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmtWZc64L6INuryagCcyVV8gShYOmREpJ_LQ&usqp=CAU" alt="Stationary" width="600">
  </a>
  <div class="desc"><h3>STATIONARY</h3></div>
</div>

<div class="gallery">
  <a  href="healthprod.php">
    <img src="https://c.neh.tw/thumb/f/720/af55c32ea41847eabee7.jpg" alt="Healthprod" width="600">
  </a>
  <div class="desc"><h3>HEALTH PRODUCTS</h3></div>
</div>

<div class="gallery">
  <a  href="jewellery.php">
    <img src="https://i.pinimg.com/originals/62/4d/c5/624dc55b56baf553bffe1014fc8bce63.jpg" alt="Healthprod" width="600">
  </a>
  <div class="desc"><h3>JEWELLERY</h3></div>
</div>
    </body>
</html>

<?php
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo '<div class="disp">';
echo "<h3>Stocks Info</h3>";
$sql = "CALL noofstocks()";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){ 
      
  echo "Category Name:" .$row[0] ."<br> No.of Products available: " . $row[1]; 
  echo "<br><br>";
}

// $sql2 = "SELECT vendorproductid FROM highsold";
// $result2=$conn->query($sql2);
// while ($row = mysqli_fetch_assoc($result2)) {
//   echo $row['vendorproductid'];
// }

// $sql1="SELECT vendorproductid,vendorid from vendorproduct";
// // -- group by vendorproductid
// // -- order by count(vendorproductid) desc)
// $result1=$conn->query($sql1);
// foreach($result1 as $row){
//   echo $row['vendorproductid'];
//   echo "<br>";
//   echo $row['vendorid'];
//   echo "<br>";
// }
echo "</div>";
?>
