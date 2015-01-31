
<?php
require 'inc/main.php';
require 'inc/connect.php';
$cart[]=$_SESSION['cart'];
echo "session is: " . session_id();
$productnamesearch=$_POST['productnamesearch'];

$sql = "SELECT * FROM products WHERE `productuniqueid` = '$productnamesearch'";

mysql_select_db('Mannix');
$query = mysql_query( $sql, $connect );
if(! $query )
{
  die('Could not enter data: ' . mysql_error());
}
?>
<div class='row'>
<?php
while($row = mysql_fetch_array( $query )) {
  echo "<div class='row single_product'>";
  echo "<div class='col-lg-2'></div>";
  echo "<div class='col-lg-4'>";
  echo "<img src=" . json_encode($row['productimage']) . " class='center-block'>";
  echo "</div><div class='col-lg-4'>";
  echo "<h2>" . $row['productname'] . "</h2>";
  echo "<h4>" . $row['productdescription'] . "</h4>";
  echo $row['productcategory'] . "<br>";
  echo "Size: " . $row['productsize'] . "<br>";
  echo "Price: $" . $row['productprice'] . "<br>";
  echo "Product ID: " . $row['productuniqueid'] . "<br>";
  echo "Quantity available: " . $row['productinventory'] . "<br><br>";
  echo "<form action='' method='post'><input type='submit' name='add' value='Add to cart'><input class='hide' type='text' name='productnamesearch' value='" . $productnamesearch . "'></form>";
}
if ($_POST['add']){
	array_push($_SESSION['cart'],$productnamesearch);
	echo "<span class='alert-success'>Item has been added to your cart.</span> <br><br><a href='products.php'>Continue Shopping?</a>";
}
  echo "</div>";
  echo "<div class='col-lg-2'></div>";
  echo "</div>";
  echo "</div>";
mysql_close($connect);
?>
</div>
<?php
require 'footer.php';