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
	  
	  $all_albums = getArray("albums");
	  $count = sizeof($all_albums);
	  $album = array('id' => $count ,'name' => $name, 'albums' => array() );
	  $album_name = $name." First Album";
	  array_push($album['albums'], $album_name);
	  array_push($all_albums, $album);
	  
	  
	  $album_photos = getArray("album_photos");
	  $p = array("name" => $name, "album" => $album_name, "photos" => array());
	  array_push($album_photos, $p);
	  
	  saveArray($album_photos, "album_photos");
	  saveArray($all_albums, "albums");
	  saveArray($users, 'users');
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
    <h3>Congratulations you are registered.</h3>
    <h4><a href="upload_photo.php">Upload a Photo</a></h4>
    <h4><a href="index.php">View other users albums</a></h4>
<?php
   } else
     {
     if (isset ($_POST['AddUser'])) {
     	  echo '<span style="color: red;">Please take care of the following errors:<br/><br/></span>';
	  if(($_POST['Name'] == "")){
	      echo '<span style="color: red;">Name is empty.<br/></span>';
	  }
	  if(!preg_match('#[0-9]#', $_POST['Password'])){
	    echo '<span style="color: red;">Password must have a digit.<br/></span>';
	  }
	  if(strlen($_POST['Password']) < 8){
	    echo '<span style="color: red;">Password is too short.<br/></span>';
	  }
	  if(($_POST['Password'] != $_POST['ConfirmPassword'])){
	    echo '<span style="color: red;">Passwords do not match.<br/></span>';
	  }
     } else {
       	  echo 'Please enter your information: ';
	}
       echo <<<_NOT_SUBMITTED
			  <form action="signup.php" method="post" enctype="multipart/form-data">
			  	<fieldset>
			  		<label>Username: 
			  			<input name="Name" type="text" value="${_POST["Name"]}" />
			  		</label><br/>
			  		<br/>
			  		<h6>Password must be at least 8 characters and contain a digit.</h6>
			  		<br/>
			  		<label> Password:
			  			<input name="Password" type="password" />
			  		</label><br/>			  		
			  		<label> Password:
			  			<input name ="ConfirmPassword" type="password" />
			  		</label><br/>
	    			<input name="AddUser" value="Register" type="submit"/>
			  	</fieldset>
			  </form>

_NOT_SUBMITTED;
	}

?>
      
      </div>
    </div>

  </body>  
</html>

