<?php 
	require_once('photo_lib.php');

	$users = getArray("users");
	$names = array();
	foreach($users as $user){
	  $name = $user['name'];
	  array_push($names, $name);
	}
	
	$all_albums = getArray("albums");
	$albums = array();
	foreach($all_albums as $a){
	  $user_albums = $a['albums'];
	  foreach($user_albums as $alb){
	    array_push($albums, $alb);
	  }
	}
	
	
	//get password
	$pwd = "";
	foreach($users as $user){
	  if($user['name'] == $_POST['name']){
	    $pwd = $user['password'];
	  }
	}
	
	$is_users_album = false;
	foreach($all_albums as $a){
	  if($a['name'] == $_POST['name']){
	    $is_users_album = in_array($_POST['album'], $a['albums']);
	  }
	}
	
	echo $_POST['album'];
	//check password
	$has_title = ($_POST['title'] != ""); 
	$pwd_match = ($_POST['password'] == $pwd); 	
	
////////////////////////////////////////////////////////////////////////////////////
// UPLOAD FILE CODE taken from W3SCHOOLS

$uploaded = false;

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

//echo $_FILES['file']['name'];
echo $_FILES["file"]["error"];
//echo ($_FILES["file"]["type"]);
//echo ($_FILES["file"]["type"] == "image/jpg");

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
{
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
 //   echo "Upload: " . $_FILES["file"]["name"] . "<br>";
 //   echo "Type: " . $_FILES["file"]["type"] . "<br>";
 //   echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 //   echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("photos/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "photos/" . $_FILES["file"]["name"]);
      $uploaded = true;
      echo "Stored in: " . "photos/" . $_FILES["file"]["name"];
      }
    }
}
else
{
  if(isset($_POST['AddPhoto'])){
    echo "Invalid file";
  }
}

///////////////////////////////////////////////////////////////////////////////////
	
	$success = isset($_POST['AddPhoto']) && $has_title && $is_users_album && $pwd_match && $uploaded;

	if($success){
	    $alb = getArray("album_photos");
	    for($i = 0; $i < sizeof($alb); $i++){
	      if($alb[$i]['name'] == $_POST['name'] && $alb[$i]['album'] == $_POST['album']){
		  $p = $alb[$i]['photos'];
		  array_push($p, $_FILES["file"]["name"]);
		  $alb[$i]['photos'] = $p;
		  saveArray($alb, "album_photos");
	      }
	    }
	
	
	    $photo_info = getArray("photos_info");
	    $p = array($_FILES["file"]["name"] => $_POST['title']);
	    array_push($photo_info, $p);
	    saveArray($photo_info, "photos_info");
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
	    <li><a href="index.html">Search</a></li>
	    <li><a href="index.html">Sign Out</a></li>
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
     	  echo '<span style="color: red;">Photo Upload Error<br></span>';
     	  if($_POST['password'] != $pwd){
	      //echo $_POST['password'];
	      echo $pwd;
	      echo '<span style="color: red;">Incorrect Password<br></span>';

     	  }
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
                    foreach ($names as $n){
                       echo "<option value='$n'>$n</option>\n";
                    } 
?>	      
		</select><br/>
		
		<label>Album: </label>
		<select name="album">
<?php
                    foreach ($albums as $a){
                       echo "<option value='$a'>$a</option>\n";
                    } 
?>	      
		</select><br/>
		<label> Password:</label>
		<input name="password" type="password" /><br>
	        <input type="submit" name="AddPhoto" value="Upload Photo">


	      </fieldset>
	    </form>
	  </div>
      </div>
    </div>

  </body>  
</html>