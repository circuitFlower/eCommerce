<?php $cartNum = "<span class='badge alert-success cartNum'>" . count($_SESSION['cart']) . "</span>";?>
<ul class="nav navbar-nav">
        <li><a href="products.php">Products <span class="sr-only">(current)</span></a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="cs.php">Customer Service</a></li>
        <li class='cart-width'><a href="cart.php">Cart <?php echo $cartNum ?></a></li>
       
    <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>

 			
  	<?php 
	  if($_SESSION['role'] == 'admin'){
	  ?> <li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Staff <span class="caret"></span></a>
			<?php require 'staff_menu.php';?></li>
			<?php
		}
		?>
</ul>