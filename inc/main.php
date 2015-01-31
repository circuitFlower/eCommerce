<?php
session_start();
require 'connect.php';
echo "<html>";
echo "<head><script type='text/javascript' src='js/jquery-1.11.2.min.js'></script><script type='text/javascript' src='js/bootstrap.min.js'></script><link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'></head>";
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="brand" class="navbar-brand brand" href="index.php">PersonaliTees</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
<?php require 'pages_menu.php';?>

      <!-- 
<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
 -->

 	<?php require 'user_menu.php';?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <div class="container-fluid mainContent">
