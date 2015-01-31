<?php

require 'inc/connect.php';
require 'inc/main.php';

$sql = "SELECT * FROM products";

mysql_select_db('Mannix');
$query = mysql_query( $sql, $connect );
if(! $query )
{
  die('Could not enter data: ' . mysql_error());
}
$i=1;
// echo "<div class='row'>";
while($row = mysql_fetch_array( $query )) {
// 	<div onmousedown="WhichButton (event);">Press a mouse button over this text!</div>
	$productuniqueid = $row['productuniqueid'];
	$productname=$row['productname'];
	$productprice=$row['productprice'];
	$productsize=$row['productsize'];
	echo "<div class='product_listing col-lg-3 col-md-3 col-sm-3 col-xs-3' onmouseup='updatefield(" . json_encode($productuniqueid) . ");'>";
	echo "<img class='img-responsive' src=" . json_encode($row['productimage']) . "><br>";
	echo $productname . " $" . $productprice;
    echo "</div>";
   //  if(($i%4)==0){
//     	echo "</div>";
// 		echo "<div class='row'>";
// 	}
    $i++;
}
// echo "</div>";


mysql_close($connect);
?>
<script>
function post(){
	document.forms["query"].submit();
}

function  updatefield(x){
	document.getElementById("query_field").value=x;
	post();
}
</script>

<form action="product.php" method="post" id="query" name="query" class="hide">
<input type="text" name="productnamesearch" id="query_field">
<input type="submit">
</form>
 </div> <!--end mainContent div -->
 <?php
require 'footer.php';

