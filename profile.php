<?php 
	require_once('photo_lib.php');
	
	 $n = $_GET['name']; 
	 $all_albums = getArray("albums");
	 foreach($all_albums as $alb){
	    if($alb['name'] == $_GET['name']){
	      $albums = $alb['albums'];
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
<?php 
  if($success){
?>      
    <h3>Photo was uploaded.</h3>
<?php
   } else
     {
     if (isset ($_POST['ViewAlbum'])) {
     	  echo '<span style="color: red;">Error</span>';
     } else {
       	  echo 'Select an Album to View';
	}
?>
	<form action="view_album.php" method="get" enctype="multipart/form-data">
	  <fieldset>
	    <input type="hidden" name="name" value="
<?php $_GET['name']
?>	    
	    " />
	    <select name="name">
<?php 
                       echo "<option value='$n'>$n</option>\n";
?>
	    </select><br>
	    <label>Select an album to view:</label><br>
	      
	      <select name="album">
<?php
                    foreach ($albums as $a){
                       echo "<option value='$a'>$a</option>\n";
                    } 
?>	      
              </select><br>
	    <input name="ViewAlbum" value="View Album" type="submit"/>

	  </fieldset>
	  </form>
<?php
	}

?>
      
      </div>
    </div>

  </body>  
</html>