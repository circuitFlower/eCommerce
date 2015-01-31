
<?php
require 'inc/main.php';
require 'inc/connect.php';
$email = $_POST['email'];
$sql = "SELECT * FROM users WHERE `email` = '$email'";
mysql_select_db('Mannix');
$query = mysql_query( $sql, $connect );
if(! $query ){
  die('Could not enter data: ' . mysql_error());
} 
$row = mysql_fetch_array($query); 
if ($row['pwrd'] == $_POST['pword']){
	echo "You are logged in successfully";
	session_start();
	$_SESSION['cart'] = array();
	$_SESSION['firstname'] = $row['firstname'];
	$_SESSION['lastname'] = $row['lastname'];
	$_SESSION['billingaddress'] = $row['billingaddress'];
	$_SESSION['shippingaddress'] = $row['shippingaddress'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['phone'] = $row['phone'];
	$_SESSION['role'] = $row['role'];
	} else {
		echo "Please check your email address and password.";
		}
mysql_close($connect);
?>
</div>
<?php
require 'footer.php';