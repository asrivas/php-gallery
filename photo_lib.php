<?php

// If $fileName is writable, saveArray writes a textual (JSON) encoding of $array
// to $fileName. Otherwise exits with an error message.
// The format of this encoding is basically '{"Key1":"Value1","Key2":"Value2", ...}' if
// you want to populate it by hand initially. 

function saveArray($array, $fileName) {
	 if (is_writable($fileName)){
	 	 $fp = fopen($fileName, 'w');
	 	 fwrite($fp, json_encode($array));
	 	 fclose($fp);
	 } else {
	   die("Can't write to $fileName");
	 }
}


// If $filename exists and is readable, getArray returns an associative array of its
// contents. Otherwise exits with an error message.

function getArray($fileName) {
	 if (is_readable($fileName)){
	 	 $fp = fopen($fileName, 'r');
		 $contents = fread($fp, filesize($fileName));
		 fclose($fp);
	 	 return (json_decode($contents, true));
	 } else {
	   die("Can't open $fileName");
         }	      
}

?>