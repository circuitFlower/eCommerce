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
	if($_SESSION['role'] == $row['role']){
		echo $row['firstname'] . " " . $row['lastname'] . "<br>";
		echo "Billing Address: <br>" . $row['billingaddress'] . "<br>";
		echo "Shipping Address: <br>" . $row['shippingaddress'] . "<br>";
		echo "Email: <br>" . $row['email'] . "<br>";
		echo "Phone: <br>" . $row['phone'] . "<br>";
		echo "User role: <br>" . $row['role'] . "<br>";
		echo "Change user role: <form action='' method='post'><select name='role'><option name='newRole' value='customer'>customer</option><option name='newRole' value='admin'>admin</option></select><input type='submit' name='changeRole' value='Change User Role'></form>";
	}
	}
	if ($_POST['changeRole']){
		$role=$_POST['role'];
		$sqlRole = "UPDATE users SET `role`='$role'";
		$newRole = mysql_query( $sqlRole, $connect );
	}

mysql_close($connect);
?>
</div>
<?php
require 'footer.php';