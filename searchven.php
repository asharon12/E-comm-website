<?php include('server.php')?>

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
}
    </style>
   <body>
            <nav class="navbar background">
                <ul class="nav-list">
                    <div class="logo">
                        <!-- <a href="venpage.php"> -->
                        <img src="logo.png">
                    </div>
                    <li><a href="venpage.php">Hello,<?php echo $_SESSION['vname']; ?> </a></li>
                    <li><a href="#">Earnings</a></li>
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
$search = $_POST['search'];
$vname= $_SESSION['vname'];
$sql1 = "SELECT vendorid FROM vendor WHERE vendorname='$vname' ";
$result = $conn->query($sql1);
foreach($result as $row) {
    $vendorid = $row['vendorid'];
}
echo '<div class="disp">';
echo "<h2>RESULTS</h2>";
echo '</div>';
$sql2 = "SELECT productname,price,descr FROM product p,vendorproduct v WHERE p.productid=v.productid AND vendorid='$vendorid' AND productname LIKE '%$search%'";
$result = $conn->query($sql2);
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
    echo '<div class="disp">';
	echo "<br><br>PRODUCT NAME:".$row['productname']."<br>PRICE:".$row['price']."<br>DESCRIPTION:".$row['descr']."<br></div><br>";
    
}

} else {
	echo "NO SEARCH MATCHES";
}
echo '</div>';

?>