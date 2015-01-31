
<?php
require 'inc/connect.php';
require 'inc/main.php';

$countCartItems = count($_SESSION['cart']);
$cartItems = $_SESSION['cart'];


$i=0;

mysql_select_db('Mannix');

echo "You have " . count($_SESSION['cart']) . " items in your cart.<br>";
while ($i <= $countCartItems){
	$item = $cartItems[$i];
	$sql = "SELECT * FROM products WHERE `productuniqueid` = '$item'";
	$query = mysql_query( $sql, $connect );
	if(! $query ){
	  die('Could not collect data: ' . mysql_error());
	}
	$productname = mysql_fetch_array($query);
	echo "<img src='" . $productname['productimage'] . "' class='imgCart'>";
	echo "<a href='" . $cartItems[$i] . "'>" . $productname['productname'] . "</a><br>";
	$i++;
	}
mysql_close($connect);
echo "<form method='post' action='checkout.php'><input type='submit' name='checkout' value='Checkout'></form>";
echo "<form method='post' action=''><input type='submit' name='emptyCart' value='Empty Cart'></form>";
if ($_POST['emptyCart']){
	$_SESSION['cart'] = array();
}

?>
</div>
<?php
require 'footer.php';