<?php
include('server.php');
?>

    <form action="addorder.php" METHOD ='POST'>
 
<input type="radio" id="payoffline" name="paytype" value="payoffline">
 <label for="payoffline">PAY OFFLINE</label><br>
 <input type="radio" id="payonline" name="paytype" value="payoffline">
 <label for="payonline">PAY ONLINE</label><br>
 <button type='submit'>SUBMIT
</form>
