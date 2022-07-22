<?php include('server.php') ?>

<!DOCTYPE html>
<html>

<body>
    <form method="post" action="connectven.php">
        <label for="vname">Vendor Name:</label>
        <input type="text" id="vname" name="vname" required></input><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required></input><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required></input><br>
        <label for="password">Password:</label>
        <input type="password" id="vpassword" name="vpassword" required></input><br>
        <label for="contact">Vendor Contact:</label>
        <input type="number" id="vcontact" name="vcontact" required></input>
       <?php  $sql2 = "SELECT couriername,courierid FROM courier";
        $result = $conn->query($sql2);
        echo "<label for='couriername'>Courier Name:</label><select id=couriername name=couriername>"; // list box select command

        foreach ($result as $row){//Array or records stored in $row

        echo "<option value=$row[courierid]>$row[couriername]</option>"; 


}
echo "</select>";
?>
        <button onclick="document.getElementById(dis)" type="submit">Signup</button>

    </form>


</body>

</html>
