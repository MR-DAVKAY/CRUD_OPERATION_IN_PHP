<?php
define("HOSTNAME","localhost");
define("USERNAME","velelaze");
define("PASSWORD","@davkay65");
define("DATABASE","velelaze");

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if($connection)
{
    echo "Connected";
}
else
{
    echo "Failed!!!";
}

?>