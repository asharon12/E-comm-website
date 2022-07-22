<?php include('server.php');
?>
<?php 

$fname=$_POST['fname'];
//echo "$fname";
$_SESSION['fname']=$_POST['fname'];
$password=$_POST['password'];

// $sql = "SELECT * FROM customers WHERE Firstname='$fname' AND pwd='$password'";
// echo $sql;
$sql = "SELECT custid FROM customers WHERE Firstname='$fname' AND pwd='$password'";
$result = $conn->query($sql);
if($result->num_rows > 0)
   {
    include("custpage.php");
   }
else
   {
    echo 'INCORRECT USERNAME OR PASSWORD';
    include("customer.html");
   }
   

?>