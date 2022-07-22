<?php include('server.php')?>

<?php 

$categoryname=$_POST['categoryname'];
$_SESSION['categoryname']=$_POST['categoryname'];
$vendorid=$_POST['vendorid'];
$_SESSION['vendorid']=$_POST['vendorid'];


// $sql = "SELECT * FROM customers WHERE Firstname='$fname' AND pwd='$password'";
// echo $sql;
$sql = "SELECT categoryid FROM category WHERE categoryname='$categoryname'";
$result = $conn->query($sql);
if($result->num_rows > 0)
   {
    include("venprod.php");
   }
else
   {
    echo '<script type="text/javascript">';
echo ' alert("INCORRECT CATEGORY")';  //not showing an alert box.
echo '</script>';
include("addproduct.php");
   }
   

?>