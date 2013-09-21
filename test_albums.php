<?php 
    require_once('photo_lib.php');
    
    $albums = array();
    $a1 = array("name" => "asrivas", "albums" => array() );
    array_push($a1['albums'], 'one');
    array_push($a1['albums'], 'two');
   // print_r($a1);
    
    $a2 = array("name" => "bob", "albums" => array() );
    array_push($a2['albums'], 'bobs album');
    
    array_push($albums, $a1);
    array_push($albums, $a2);
   // print_r($albums);
    
    $a3 = array("name" => "joe", "albums" => array("one", "two", "three") );
    array_push($albums, $a3);
    saveArray($albums, "test_albums");

    
    $albums = getArray('test_albums');
    $a3 = array("name" => "george", "albums" => array("four") );
    $albums[2] = $a3;
    
    for($i = 0; $i < sizeof($albums); $i++){
      if ($albums[$i]['name'] == 'george'){
	  $a = $albums[$i]['albums'];
	  array_push($a, "five");
	  $albums[$i]['albums'] = $a;
	  print_r($a);
      }
     // print_r($albums[$i]);
    }

    //print_r($albums);
    saveArray($albums, "test_albums");

    
?>