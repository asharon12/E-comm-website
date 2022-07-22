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
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
        <body>
<div class="disp">
        <form action="ordconfirm.php" method="POST">
        <br><h2>ENTER ADDRESS DETAILS</h2><br>
        <label for="hno">House No:</label><br>
        <input type="text" id="hno" name="hno" required></input><br>
        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street" required></input><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required></input><br>
        <label for="province">Province:</label><br>
        <input type="text" id="province" name="province" required></input><br>
        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" required></input><br>  
        <input type="radio" id="payoffline" name="paytype" value="payoffline">
        <label for="payoffline">PAY OFFLINE</label><br>
        <input type="radio" id="payonline" name="paytype" value="payoffline">
        <label for="payonline">PAY ONLINE</label><br>      
        <button id="myButton" class='button'>SUBMIT</button>
</div>
</form>
</body>
</html>