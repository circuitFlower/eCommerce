<ul class="nav navbar-nav navbar-right">
	<?php
	if (isset($_SESSION['firstname'])){
	?>
	<li><a href="logout.php">Logout</a></li>
	<li><a href="user_account.php">My Account</a></li>
	<?php
	} else {
	?>
	<li><a href="add_user.php">Register</a></li>
	<li><a href="login.php">Login</a></li>
	<?php
	}
	?>
</ul>

