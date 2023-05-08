<?php
/*
Author: Terry Brady, Georgetown University Libraries
Wrapper to pass a request through to the Alma API.  The alma api request will be passed in the param apipath.
*/
include 'Alma.php';

$AlmaPut = new AlmaPut();
header("Content-type: application/json");
$ALMA->put($_PUT);

?>
