<?php

namespace App\Services;

class CCDAService {

	public function __construct() {

	}

	public function saveCCDAAsJson($xmlfilePath){
		$jsonfilename = str_random(9) . ".json";
		$jsonFile = public_path() . '/' . $jsonfilename;
		$xmlToJson = exec("node " . app_path() . "/tojson.js " . $xmlfilePath . " " . $jsonFile);
		$jsonString = file_get_contents($jsonFile, true);
		$validator = \Validator::make(array('jsson' => $jsonString), array('jsson' => 'Required|json'));
		if ($validator->fails())
			return 'Invalid File';
		unlink($jsonFile);
		return $jsonString;
	}

}


?>
