
<?php
require 'inc/main.php';
$_SESSION['cart'] = "";
$_SESSION['firstname'] = '';
$_SESSION['lastname'] = '';
$_SESSION['billingaddress'] = '';
$_SESSION['shippingaddress'] = '';
$_SESSION['email'] = '';
$_SESSION['phone'] = '';
$_SESSION['role'] = '';
echo "You are logged out";
?>
</div>
<?php
require 'footer.php';