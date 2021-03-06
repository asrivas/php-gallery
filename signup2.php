<?php

	require_once('photo_lib.php');
	$pwd_length = (strlen($_POST['Password']) >= 8);
	$has_digit = preg_match('#[0-9]#', $_POST['Password']);
	$same_pwd = ($_POST['Password'] === $_POST['ConfirmPassword']);
	$good_pwd = $pwd_length && $has_digit && $same_pwd;
	$success = isset($_POST['AddUser']) && $good_pwd;
	
	if($success){
	  $name = $_POST['Name'];
	  $password = $_POST['Password'];
	  $users = getArray('users');
	  $user = array('name' => $name, 'password' => $password);
	  array_push($users, $user);
	  saveArray($users, 'users');
	  echo 'Your registration was successful!';
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--Anu Srivastava
    as43758
    asrivastava274@gmail.com
-->
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head>
    <title>Asrivas' Photo Gallery</title>
    <link rel="stylesheet" href="style.css" />
    <!--http://www.oswd.org/design/information/id/2704-->
  </head>
  
  <body> 
    <div id="container">
      <div id="header">
	    <h1>Asrivas' Photo Gallery</h1>
      </div>
     
      <div id="nav-bar">
	    <ul>	
	        <li><a href="index.php">Home</a></li>
	        <li><a href="signup.php">Sign Up</a></li>
	        <div id="right-tab">
	            <li><a href="index.php">Search : <input type="text" name="search" size="6" /> </a></li>
	            <li><a href="index.php">Sign Out</a></li>
	        </div>
	    </ul>
      </div>
      <div id="content" align="center">
	
<?php 
  if ($success) {
?>
	<h3>You are registered.</h3>
	<h4>Upload a photo</h4>
	<h4>View other users albums</h4>
<?php 
  } else {
      if(isset($_POST['AddUser'])){
 
      } else {
	echo 'Please enter your information to register';
      }
      echo <<< _NOT_SUBMITTED
      <form action="signup.php" method="post" enctype="multipart/form-data">
        <fieldset>
	  <label>Name:
	    <input name="Name" type="text" />
	  </label>
	</fieldset>
      </form>
    }
_NOT_SUBMITTED;
}
?>  
      
    </div>
    </div>
    </div>

  </body>
</html>
