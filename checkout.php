<?php
require 'inc/main.php';
require 'inc/connect.php';
if(isset($_SESSION['firstname'])){
$countCartItems = count($_SESSION['cart']);
echo "You have " . count($_SESSION['cart']) . " items in your cart.<br>";
echo "Please confirm your account information:<br><br>";
$cartItems = $_SESSION['cart'];
$i=0;
$prices = array();
$items = array();
	mysql_select_db('Mannix');
	while ($i <= $countCartItems){
		$item = preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags($cartItems[$i]));
		array_push($items,$item);
		$sql = "SELECT * FROM products WHERE `productuniqueid` = '$item'";
		$query = mysql_query( $sql, $connect );
		if(! $query ){
		  die('Could not collect data: ' . mysql_error());
		}
		$productname = mysql_fetch_array($query);
		$price = preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags($productname['productprice']));
	
		array_push($prices,$price);
		$total = array_sum($prices);
		$i++;
		}
	mysql_close($connect);
	
	echo "<form action='place_order.php' method='post'>";
	echo "First Name: <input class='floatRight' type='text' name='firstname' value='" . $_SESSION['firstname'] . "'><br><br>";
	echo "Last Name: <input class='floatRight' type='text' name='lastname' value='" . $_SESSION['lastname'] . "'><br><br>";
	echo "Billing Address: <input class='floatRight' type='text' name='billingaddress' value='" . $_SESSION['billingaddress'] . "'><br><br>";
	echo "Shipping Address: <input class='floatRight' type='text' name='shippingaddress' value='" . $_SESSION['shippingaddress'] . "'><br><br>";
	echo "Email: <input class='floatRight' type='text' name='email' value='" . $_SESSION['email'] . "'><br><br>";
	echo "Phone: <input class='floatRight' type='text' name='phone' value='" . $_SESSION['phone'] . "'><br><br>";
	echo "Items: <input class='floatRight' type='text' name='items' value='" . implode(',',$items) . "'><br><br>";
	echo "Total: <input class='floatRight' type='text' name='total' value='" . $total . "'><br><br>";
	echo "<input type='submit' name='submit' value='Place Order'>";
	} else {
	echo "Please <a href='login.php'>log in</a> or <a href='add_user.php'>register</a> to complete your transaction.";
	}
?>
</div>
<?php
require 'footer.php';