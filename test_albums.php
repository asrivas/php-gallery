<?php 
    require_once('photo_lib.php');
    
    $albums = getArray("test_albums");
    $a1 = array("name" => "asrivas", "albums" => array() );
    array_push($a1['albums'], 'one');
    array_push($a1['albums'], 'two');
    print_r($a1);
    
    $a2 = array("name" => "bob", "albums" => array() );
    array_push($a2['albums'], 'bobs album');
    
    array_push($albums, $a1);
    array_push($albums, $a2);
    print_r($albums);
    saveArray($albums, "test_albums");

    
?>