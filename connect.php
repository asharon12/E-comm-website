<?php include('server.php')?>
<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$password=$_POST["password"];
$contact=$_POST["contact"];

$sql = "INSERT into customers(firstname,lastname,dob,email,pwd,contact) values 
('$fname','$lname','$dob','$email','$password','$contact')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  include("success.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "SELECT custid FROM customers WHERE firstname='$fname' AND contact='$contact'";
$result = $conn->query($sql2);
while($row = $result->fetch_assoc()){
  $custid=$row['custid'];
}

$sql3 = "INSERT INTO cart(dtcreated,custid) values (NOW(),'$custid')";
if ($conn->query($sql3) === TRUE) {
  echo "<h3>New record created successfully in cart table</h3>";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
$conn->close();
?>