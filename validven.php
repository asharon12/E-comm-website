<?php include('server.php')?>
<?php 

$vname=$_POST['vname'];
$_SESSION['vname']=$_POST['vname'];
$vpassword=$_POST['vpassword'];
//echo $_SESSION['vname'];

// $sql = "SELECT * FROM customers WHERE Firstname='$fname' AND pwd='$password'";
// echo $sql;
$sql = "SELECT vendorid FROM vendor WHERE vendorname='$vname' AND vpass='$vpassword'";
$result = $conn->query($sql);
foreach($result as $row){
   // echo "Vendor id is: ";
   // echo $row['vendorid'];
}
$vendorid=$row['vendorid'];
$_SESSION['vendorid']=$vendorid;
//$_SESSION['vendorid']=$row['vendorid'];
//echo $_SESSION['vendorid'];
 if($result->num_rows > 0)
   {
     //echo "<form action='addproduct.php' method='POST'>
   //<input id='vendorid' name='vendorid' type='hidden' value= '$vendorid';?
    include("venpage.php");
    //include("addprodb.php");
   }
else
   {
    echo 'INCORRECT USERNAME OR PASSWORD';
    include("vendor.html");
   }
   ?>
   
