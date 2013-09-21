<?php 
	require_once('photo_lib.php');

	$users = getArray("users");
	$names = array();
	foreach($users as $user){
	  $name = $user['name'];
	  array_push($names, $name);
	}
	
	if($success){

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
	   <li><a href="create_album.php">Create Album</a></li>
	   <li><a href="upload_photo.php">Upload Photo</li>
	   <li><a href="index.php">Search </a></li>
	   <li><a href="index.php">Sign Out</a></li>
	</ul>
      </div>

      <div id="content">
<?php 
  if($success){
?>      
    <h3>Photo was uploaded.</h3>
<?php
   } else
     {
	if (isset ($_POST['AddPhoto'])) {
     	  echo '<span style="color: red;">Photo Upload Error</span>';
	} else {
       	  echo 'Upload a Photo';
	}
    }
?>
	  <div id="form">
	    <form action="upload_photo.php" method="post" enctype="multipart/form-data">
	      <fieldset>
		<labet>Title: </label>
		<input name="title" type="text" value="" /><br>

		<label>File: </label>
		<input type="file" name="file" id="file"><br/>
		<label>User: </label>
		<select name="name">
<?php
		     print_r($names);
                    foreach ($names as $name){
                       echo "<option value='$name'>$name</option>\n";
                    } 
?>	      
		</select><br/>
		<label>Album: </label><br/>
		<label> Password:</label><br/>
		<input name="Password" type="password" /><br/>
		
	        <input type="submit" name="UploadPhoto" value="Upload Photo">


	      </fieldset>
	    </form>
	  </div>
      </div>
    </div>

  </body>  
</html>