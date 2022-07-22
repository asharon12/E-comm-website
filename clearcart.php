<?php include('server.php');?>
<?php 

$fname=$_SESSION['fname'];

$sql="DELETE  from cartproduct where cartid=(SELECT cartid from cart where custid=(SELECT custid from customers where firstname='$fname'))";
if($conn->query($sql)==TRUE){
    include('cartdisplay.php');
}
else{
    echo "error";
}
?>

