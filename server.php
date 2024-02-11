<?php
define("HOSTNAME","localhost");
define("USERNAME","velelaze");
define("PASSWORD","@davkay65");
define("DATABASE","velelaze");

$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if($conn)
{
       echo "";
}
else {
 echo "error";
              
}
?>