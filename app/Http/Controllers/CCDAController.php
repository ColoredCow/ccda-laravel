<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\CCDAService;

class CCDAController extends Controller
{
	private $ccdaService;
	public function __construct(CCDAService $ccdaService) {
		$this->ccdaService = $ccdaService;
	}

	public function saveCCDA(Request $request){
		if ($request->hasFile('patient_ccda')) {
			$file = $request->file('patient_ccda');
			$extension = $file->getClientOriginalExtension();
			$xmlfilename = str_random(9) . ".{$extension}";
			$jsonfilename = str_random(9) . ".json";
			$upload_success = $file->move(public_path(), $xmlfilename);
			$xmlfilePath = public_path() . '/' . $xmlfilename;

			$jsonString = $this->ccdaService->saveCCDAAsJson($xmlfilePath);
			unlink($xmlfilePath);
			return $jsonString;

			$ccda = new Ccda;
			$ccda->ccdablob = $jsonstring;
			$ccda->patient_id = $request->patient_id;

		}

	}
}
