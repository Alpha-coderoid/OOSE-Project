<?php
echo count(glob(session_save_path() . '/*'));;
echo "<br>";

session_start();
//print_r($_SERVER);
foreach($_SERVER as $key_name => $key_value) {

print $key_name . " = " . $key_value . "<br>";

}

?>