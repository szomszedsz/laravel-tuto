<?php 
echo "It works on my machine!";
$xdebug = "test";

var_dump( xdebug_info( 'mode' ) );
xdebug_info();
phpinfo();
?>
