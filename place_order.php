
<?php
require 'inc/connect.php';
require 'inc/main.php';

if(! get_magic_quotes_gpc() ) {
   $email=addslashes($_POST['email']);
   $items=addslashes($_POST['items']);
} else {
   $email=$_POST['email'];
   $items=$_POST['items'];
}

$sql = "INSERT INTO orders (email,items) VALUES ('$email','$items')";
$orderID = "SELECT LAST_INSERT_ID()";
$getOrderID = mysql_query($orderID, $connect);
mysql_select_db('Mannix');
$retval = mysql_query( $sql, $connect );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$_SESSION['cart']="";
echo "Order placed successfully. Your order number is " . $getOrderID;
mysql_close($connect);
?>
</div>
<?php
require 'footer.php';