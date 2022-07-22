<?php include('server.php')?>
<?php
$vname=$_POST["vname"];
$_SESSION['vname']=$_POST['vname'];
$address=$_POST["address"];
$email=$_POST["email"];
$vpassword=$_POST["vpassword"];
$vcontact=$_POST["vcontact"];
$couriername=$_POST['couriername'];



$sql = "insert into vendor(vendorname,address,email,vpass,contact) values 
('$vname','$address','$email','$vpassword','$vcontact')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  //include("successven.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql4="SELECT vendorid from vendor where vendorname='$vname' and email='$email'";
$result4=$conn->query($sql4);
foreach($result4 as $row){
  $vendorid=$row['vendorid'];
}
// $sql2 = "SELECT couriername,courierid FROM courier";
// $result = $conn->query($sql2);
// echo "<label for='couriername'>Courier Name:</label><select id=couriername name=couriername>"; // list box select command

// foreach ($result as $row){//Array or records stored in $row

// echo "<option value=$row[courierid]>$row[couriername]</option>"; 


// }
// echo "</select>";

$sql3 = "INSERT INTO vendorcourier(vendorid,courierid) VALUES ('$vendorid','$couriername')";

if ($conn->query($sql3) === TRUE) {
  echo "<h3>New record created successfully in vendorcourier table</h3>";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}

echo include('successven.html');


$conn->close();
?>