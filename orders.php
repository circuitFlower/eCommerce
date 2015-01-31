<?php

require 'inc/connect.php';
require 'inc/main.php';
$email=$_SESSION['email'];
$sql = "SELECT * FROM orders";
mysql_select_db('Mannix');
$query = mysql_query( $sql, $connect );
if(! $query ){
  die('Could not enter data: ' . mysql_error());
}
while($row = mysql_fetch_array( $query )) {
	echo "Order ID: " . $row['orderid'] . "User email: " . $row['email'] . " Items ordered: " . $row['items'] . "<br>";
	
	
	
}
mysql_close($connect);
?>
</div>
<?php
require 'footer.php';