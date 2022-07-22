<?php include('server.php') ?>
<?php
$vendorid = $_POST['vendorid'];
$_SESSION['vendorid']=$_POST['vendorid'];
include('addproduct.php');
//$sql = "SELECT vendorid FROM vendor WHERE vendorid='$vendorid'";
?>
<form action='addproduct.php' method='POST'>"
   <label for='vendorid'>Confirm ur id</label>"
   <input id='vendorid' name='vendorid' type='hidden' value= '<?php echo $vendorid; ?>'>