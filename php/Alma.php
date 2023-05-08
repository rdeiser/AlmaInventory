<?php
//Author: Terry Brady, Georgetown University Libraries
class Alma {
	function __construct() {
      $configpath = parse_ini_file ("Alma.prop", false);
      $proppath = $configpath["proppath"];
      $sconfig = parse_ini_file ($proppath, false);
      $this->alma_apikey = $sconfig["ALMA_APIKEY"];
	}

  function getApiKey() {
    return $this->alma_apikey;
  }

  function getRequest($param) {
    if (isset($param["apipath"])){
      $apipath = $param["apipath"];
      unset($param["apipath"]);
      $param["apikey"] = $this->getApiKey();
      $url = "{$apipath}?" . http_build_query($param);
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json'
  	  ));

      $jsonstr = curl_exec ($ch);

      curl_close ($ch);
      echo $jsonstr;
    }
    echo "";
  }
}

class AlmaPut {
// }
// Line 308 in grima
  // {{{ put - general function for PUT (update) API calls
/* *
 * @brief general function for PUT (update) API calls
 *
 * @param string $url - URL pattern string with parameters in {}
 * @param array $URLparams - URL parameters
 * @param array $QSparams - query string parameters
 * @param DomDocument $body - record to update Alma record with
 * @return DomDocument - record as it now appears in Alma
 */

 // function put($param,$body) {
  function put($param,$body) {

    function put($param, $body) {
   if (isset($param["apipath"])){
   $apipath = $param["apipath"];
   unset($param["apipath"]);
   $param["apipath"] = $this->getApiKey();
   $url = "{$apipath}?" . http_build_query($param);

   $bodyjson = json_encode($body);

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_HEADER, FALSE);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
   curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyjson);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
   $response = curl_exec($ch);
   $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
   if (curl_errno($ch)) {
       throw new Exception("Network error: " . curl_error($ch));
   }
   curl_close($ch);
   $json = json_decode($response, true);
   if ($json === null) {
       throw new Exception("Malformed JSON from Alma: " . json_last_error_msg());
   }
   return $json;
}
    }
}
// }}}

}
