<?php 
	require_once('photo_lib.php');
	$alb_photos = getArray("album_photos");
	$photos;
	foreach($alb_photos as $a){
	  if($a['name'] == $_GET['name'] && $a['album'] == $_GET['album']){
	    $photos = $a['photos'];
	  }
	}
	$first_photo = $photos[0];
	

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
<?php echo ($_GET['album']);
?></h3>
	<img src="photos/
	
<?php echo($first_photo); 	
?>" height="200" width="200">
	<h5>Select a photo to view</h5>
	
	<form action="view_photo.php" method="get" enctype="multipart/form-data">
	 <fieldset>
	 
	 <select name="name">
<?php 
                       echo "<option value='${_GET['album']}'>${_GET['album']}</option>\n";
?>
	    </select><br>
	    
	    <select name="photo">
<?php
                    foreach ($photos as $p){
                       echo "<option value='$p'>$p</option>\n";
                    } 
?>	      
              </select><br>
	    <input name="ViewPhoto" value="View Photo" type="submit"/>
	 <fieldset>
	</form>
	
      
      </div>
    </div>

  </body>  
</html>