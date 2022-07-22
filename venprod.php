<?php
include('server.php')?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="prodstyle.css">
    </head>
    <style>
         body {
        background: linear-gradient(rgba(0, 0, 25, 0.5), rgba(0, 0, 25, 0.5));
        background-image: url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBg8RBw8NEBEQDw0PDhUODRUNEBAUFREiFiARExUYHSggGBolGxMVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0NFRAQFy0fFx8rKysuKy03LSsrLS0rKysrLSstKy03KystKysrKystKystKystKzcrLSsrNysrNysrK//AABEIASsAqAMBIgACEQEDEQH/xAAaAAEBAQEBAQEAAAAAAAAAAAAAAwIBBQQH/8QAJBABAAICAgEEAgMAAAAAAAAAAAECAxEhMTJBYXGxIqEEUuH/xAAYAQEBAQEBAAAAAAAAAAAAAAAAAgEDBP/EABgRAQEBAQEAAAAAAAAAAAAAAAABAhES/9oADAMBAAIRAxEAPwD9wAAAAAAAAAAAAAAABm86hJ207lxjpJwAY0ABcBTkAAAAAAAAAAAAMZLejUzqEZncsqswAYsAAABcBTkAAAAAAAAAAAze2oBi9tyyDHSADGgAAALgKcgAAAAAAAAABG07lvJb0hNlXmADFAAAAAALgKcgAAAAAAAByZ1DqV7bkbJ1meQEugAAAAAAAC4CnIAAAAAAABm86hJ207lxjpJwAY0AAAAAAABcBTkAAAAAAMZLejVp1CM8sqswAYsAAAAAAAAABcBTkAAAAAze2oBi9tyyCXSAA0AAAAAAAAABcBTkAAAAI2nctZLejDKvMAGKAAAAAAAAAAAAXAU5AADlp1DqV7bkbJ1nsBLoAAAAAAAAAADN8ladoXz2nx4+2Wtk6va1a+Uj45nfYz0ry9UB0ecA6Bm9tQk7ady4x0k4AMaAAAAAACd81a9c/CF8tre3wy1sza+i+WtP8QvmtbrhMTauZgAxoAD1QHZ5RPJb0btOoRZVZgAxYAADkzERyDpPHaN88R4IWva3lLLpUzX0Xz1jx5+kL5LX7ZE29VJIAMaAAAAAA9UGbzqHZ5WL23LIJdAGbXrTyka05a0Vj8kL55nx4RmZmeU3Sple/wDI/p+0bWm0/k4J6uSQAAAAAAAAAAAB6vSNp3LWS3ohfNWvv8OtrhmKMXyVp2hfNa3t8JounSZVvntPjx9pAnq5OAAAAAAAAAAAAAAAAN3y3v3+mAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB//9k=');
        background-size: 100% 100%;
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
    font-size: 25px;
}
.button {
  background-color: #CC3399;
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
$categoryname=$_SESSION['categoryname'];
$vendorid=$_SESSION['vendorid'];
$sql="SELECT categoryid from category WHERE categoryname='$categoryname'";
$result = $conn->query($sql);
foreach($result as $row) {
}
$categoryid=$row['categoryid'];



?>
<!-- <?php echo $_SESSION['vname']; ?> -->
<div class="disp">
<form action='addprodb.php' method='POST'>
<!--<label for='categoryid'>Categoryid:</label>-->
<input id='categoryid' name='categoryid' type='hidden' value="<?php echo $categoryid?>">
<input id='vendorid' name='vendorid' type='hidden' value='<?php echo $vendorid;?>'>
<!--<input id='vendorid' name='vendorid' type='text' value='<?php echo $vendorid ?>'-->
<label for='productname'>Product Name:</label>
<input id='productname' name='productname' type='text'><br><br>
<label for='price'>Price:</label>
<input id='price' name='price' type='text'><br><br>
<label for='quantity'>Quantity:</label>
<input id='quantity' name='quantity' type='text'><br><br>
<label for='desc'>Description:</label>
<input id='desc' name='desc' type='text'><br><br>

<!-- <?php
echo '<div class="disp">';
$sql2 = "SELECT couriername,courierid FROM courier";
$result = $conn->query($sql2);
echo "<label for='couriername'>Courier Name:</label><select id=couriername name=couriername>"; // list box select command

foreach ($result as $row){//Array or records stored in $row

echo "<option value=$row[courierid]>$row[couriername]</option>"; 


}
echo "</select>";

echo "</div>";
?> -->

<br>
<button type='submit' class='button'>Submit</button>
</form>
</div>