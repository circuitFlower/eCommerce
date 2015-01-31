<?php

require 'inc/connect.php';
require 'inc/main.php';
$email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE `email`='$email'";
mysql_select_db('Mannix');
$query = mysql_query( $sql, $connect );
if(! $query ){
  die('Could not enter data: ' . mysql_error());
}
while($row = mysql_fetch_array( $query )) {
	echo $row['firstname'] . " " . $row['lastname'] . "<br>";
	echo "Billing Address: <br>" . $row['billingaddress'] . "<br>";
	echo "Shipping Address: <br>" . $row['shippingaddress'] . "<br>";
	echo "Email: <br>" . $row['email'] . "<br>";
	echo "Phone: <br>" . $row['phone'] . "<br>";
	
	
}
mysql_close($connect);
?>
</div>
<?php
require 'footer.php';