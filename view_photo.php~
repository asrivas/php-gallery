<?php 
	require_once('photo_lib.php');
	$name = $_GET['name'];
	$photo = $_GET['photo'];
	
	$photos_info = getArray("photos_info");
	foreach($photos_info as $a){
	  if(key($a) == $_GET['photo']){
	    $title = ($a[key($a)]);
	  }
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
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="style.css" />
    <!--http://www.oswd.org/design/information/id/2704-->
  </head>
  
  <body>
    <div id="container">
      <div id="header">
      	<h1>Photo Gallery</h1>
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
      <h3>
<?php echo $title; 
?>
      </h3>

	<img src="photos/
	
<?php echo($photo); 	
?>">
      
      </div>
    </div>

  </body>  
</html>