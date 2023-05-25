<?php
// START -- Created separate wrapper to pass a PUT request through to the Alma API.  The alma api request will be passed in the param apipath. -- added by K-State Libraries 05/2023

include 'Alma.php';

$Alma = new Alma();

$requestBody = file_get_contents('php://input');
$requestData = json_decode($requestBody, true);

$apipath = $requestData['url'];
$body = json_encode($requestData['body']);
$body = str_replace('\/', '/', $body);
$body = str_replace('[]', '{}', $body);


$response = $Alma->putRequest(array('apipath' => $apipath),$body);

// print_r(array('apipath' => $apipath));  // troubleshooting for json body
// print $apipath;  // troubleshooting for json body
// print_r($body); // troubleshooting for json body

echo json_encode($response);

// END -- Created separate wrapper to pass a PUT request through to the Alma API.  The alma api request will be passed in the param apipath. -- added by K-State Libraries 05/2023

?>
