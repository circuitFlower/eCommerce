<?php
require 'inc/main.php';
?>
<form method="post" action="verify_login.php">
Username (email address): <input class='floatRight' type="text" name="email"><br><br>
Password: <input class='floatRight' type="password" name="pword"><br><br>
<input type="submit">
</form>
Not a registered user? Please <a href='add_user.php'>register.</a>
</div>
<?php
require 'footer.php';
?>
</html>