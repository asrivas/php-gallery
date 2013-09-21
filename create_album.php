<?php 
	require_once('photo_lib.php');
	
	$users = getArray("users");
	$names = array();
	foreach($users as $user){
	  $n = $user['name'];
	  array_push($names, $n);
	}
	
	//get password
	$pwd = "";
	foreach($users as $user){
	  if($user['name'] == $_POST['name']){
	    $pwd = $user['password'];
	  }
	}
	
	//check password
	$has_title = ($_POST['title'] != ""); 
	$pwd_match = ($_POST['password'] == $pwd); 
	$success = isset($_POST['AddAlbum']) && $has_title && $pwd_match;
	
	$albums = getArray("albums");
	foreach($albums as $a){
	  //echo key($a);
	  //print_r($a);
	  //echo $a[0];
	}
	
	if($success){
	    $albums = getArray("albums");
	    $album;
	    foreach($albums as $key => $value){
	      if($key == $_POST['name']){
	        $album = $value;
		array_push($album, $_POST['title']);
		print_r ($album);
		saveArray($album, "albums");
	      }
	    }
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

      <div id="content" align="center">
<?php 
  if($success){
?>      
    <h3>Album was created.</h3>
    <h4><a href="upload_photo.php">Upload a Photo</a></h4>
    <h4><a href="index.php">View other users albums</a></h4>
<?php
   } else
     {
     if (isset ($_POST['AddAlbum'])) {
     	  echo '<span style="color: red;">There was an error creating the album.<br></span>';
     	  if($_POST['password'] != $pwd){
     	      echo '<span style="color: red;">Incorrect Password.<br></span>';
     	  }
     	  if($_POST['title'] == ""){
     	      echo '<span style="color: red;">Please Enter an Album Title.<br></span>';
     	  }
     	  
     } else {
       	  echo 'Create an Album';
	}
      }
?>
	  <div id="form">
	    <form action="create_album.php" method="post" enctype="multipart/form-data">
	      <fieldset>
		<labet>Title: </label>
		<input name="title" type="text" value="" /><br>
		<label>User: </label>
		<select name="name">
<?php
		     print_r($names);
                    foreach ($names as $n){
                       echo "<option value='$n'>$n</option>\n";
                    } 
?>	      
		</select><br/>
		<label> Password:</label>
		<input name="password" type="password" /><br/>
	        <input type="submit" name="AddAlbum" value="Create Album">

	      </fieldset>
	    </form>
      </div>
    </div>

  </body>  
</html>