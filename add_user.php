<?php
require 'inc/main.php';
require 'inc/connect.php';
if (isset($_POST['submit'])){
	if(! get_magic_quotes_gpc() )
	{
	   $firstname=addslashes($_POST['firstname']);
	   $lastname=addslashes($_POST['lastname']);
	   $billingaddress=addslashes($_POST['billingaddress']);
	   $shippingaddress=addslashes($_POST['shippingaddress']);
	   $phone=addslashes($_POST['phone']);
	   $email=addslashes($_POST['email']);
	   $pword=addslashes($_POST['pword']);
	   $role="customer";
	}
	else
	{
	   $firstname= ($_POST['firstname']);
	   $lastname= ($_POST['lastname']);
	   $billingaddress= ($_POST['billingaddress']);
	   $shippingaddress= ($_POST['shippingaddress']);
	   $phone= ($_POST['phone']);
	   $email= ($_POST['email']);
	   $pword=($_POST['pword']);
	   $role="customer";
	}


	$sql = "INSERT INTO users (firstname,lastname,billingaddress,shippingaddress,phone,email,pwrd,role) VALUES ('$firstname','$lastname','$billingaddress', '$shippingaddress','$phone','$email','$pword','$role')";

	mysql_select_db('Mannix');
	$retval = mysql_query( $sql, $connect );
	if(! $retval )
	{
	  die('Could not enter data: ' . mysql_error());
	}
	echo "You have successfully registered with our site. Please <a href='login.php'>Login</a>\n";
	mysql_close($connect);
} else {
	echo "<form name='newUser' action='add_user.php' method='POST'>";
	echo "First name:<input class='floatRight' type='text' name='firstname'><br><br>";
	echo "Last name:<input class='floatRight' type='text' name='lastname'><br><br>";
	echo "Billing Address:<input class='floatRight' type='text' name='billingaddress'><br><br>";
	echo "Shipping Address:<input class='floatRight' type='text' name='shippingaddress'><br><br>";
	echo "Phone:<input class='floatRight' type='text' name='phone'><br><br>";
	echo "Email:<input class='floatRight' type='text' name='email'><br><br>";
	echo "Password: <input class='floatRight' type='password' name='pword'><br><br>";
	echo "<input type='submit' name='submit'>";
	echo "</form>";
	echo "Already a registered user? Great! <a href='login.php'>Log in here.</a>";
	}
?>
</div>
<?php
require 'footer.php';