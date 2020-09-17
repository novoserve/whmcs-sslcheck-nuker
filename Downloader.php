<?php
/*
* WHMCS SSL Check Nuker
* NovoServe B.V.
*/

namespace WHMCS\Domain\Ssl;

class Downloader {
	public static function getCertificate($domain) {
		throw new \WHMCS\Exception("Unable to retrieve certificate data", 0);
	}
}
