<?php 
    require_once("photo_lib.php");
    $users = getArray("users");
  


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--Anu Srivastava
    as43758
    asrivastava274@gmail.com
-->
<html>
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
	   <li><a href="create_album.php">Create Album</a></li>
	   <li><a href="upload_photo.php">Upload Photo</li>
	   <li><a href="index.php">Search </a></li>
	   <li><a href="index.php">Sign Out</a></li>
	</ul>
      </div>
      
      <div id="content" align="center">
	<h5>Welcome to the Photo Gallery. Select a user to view his or her albums.</h5>
      </div>
<?php 
  $names = array();
  foreach($users as $user){
    $name = $user['name'];
    array_push($names, $name);
  }
?>
    	<form action="profile.php" method="get" enctype="multipart/form-data">
	  <fieldset>
	    <label>Select a User's Album to View:
	      <select name="name">
<?php
                    foreach ($names as $name){
                       echo "<option value='$name'>$name</option>\n";
                    } 
?>	      
              </select>
	    </label><br/>
	    <input name="ViewUser" value="View User" type="submit"/>

	  </fieldset>
    	</form>

	   
      <div id="footer">
	<h6>Design inspired by <a href="http://nicolas.freezee.org">Nicolas Fafchamps</a></h6>
      <div>
      
    </div>
  </body>
</html>