<?php
require 'inc/connect.php';
require 'inc/main.php';
if ($_POST['addProduct']){	
	if(! get_magic_quotes_gpc() )
	{
	
	   $productname=addslashes($_POST['productname']);
	   $productdescription=addslashes($_POST['productdescription']);
	   $productprice=addslashes($_POST['productprice']);
	   $productinventory=addslashes($_POST['productinventory']);
	   $productcategory=addslashes($_POST['productcategory']);
	   $productcolor=addslashes($_POST['productcolor']);
	   $productsize=addslashes($_POST['productsize']);
	}
	else
	{
	   $productname= ($_POST['productname']);
	   $productdescription= ($_POST['productdescription']);
	   $productprice= ($_POST['productprice']);
	   $productinventory= ($_POST['productinventory']);
	   $productcategory= ($_POST['productcategory']);
	   $productcolor= ($_POST['productcolor']);
	   $productsize= ($_POST['productsize']);
	}
	$target_dir = "productimages/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	
	mysql_select_db('Mannix');
	
	$sql = "INSERT INTO products (productname,productdescription,productprice,productinventory,productcategory,productcolor,productsize,productimage) VALUES ('$productname','$productdescription','$productprice','$productinventory','$productcategory','$productcolor','$productsize','$target_file')";

	$query = mysql_query( $sql, $connect);
	if(! $query )
	{
	  die('Could not enter data: ' . mysql_error());
	}
	echo "Product added.";
	mysql_close($connect);
} else {
	echo "<form class='form' name='add_product' action='add_product.php' method='post' enctype='multipart/form-data'>";
	echo "Product Name:<input class='floatRight' type='text' name='productname'><br><br>";
	echo "Description:<input class='floatRight' type='text' name='productdescription'><br><br>";
	echo "Price:<input class='floatRight' type='text' name='productprice'><br><br>";
	echo "Inventory:<input class='floatRight' type='text' name='productinventory'><br><br>";
	echo "Category:<input class='floatRight' type='text' name='productcategory'><br><br>";
	echo "Color:<input  class='floatRight' type='text' name='productcolor'><br><br>";
	echo "Size:<input class='floatRight' type='text' name='productsize'><br><br>";
	echo "Image:<input type='file' name='fileToUpload' id='fileToUpload'><br><br>";
	echo "<input type='submit' name='addProduct' value='Add Product'>";
	echo "</form>";
}
?>
</div>
<?php
require 'footer.php';
