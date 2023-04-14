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
  /* function putRequest($param,$body) {
    if (isset($param['apipath'])) {
      apipath = $param["apipath"];
      unset($param["apipath"]);
      $param["apikey"] = $this->getApiKey();
      $url = "{$apipath}?" . http_build_query($param);
      
      $bodyxml = $body->saveXML();

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	curl_setopt($ch, CURLOPT_HEADER, FALSE);		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');		curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyxml);		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));

      $response = curl_exec($ch);

      curl_close ($ch);
      echo $response;
    }
    echo "";
  }

} */
