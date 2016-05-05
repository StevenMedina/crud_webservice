<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/vendor/autoload.php');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class Token {
	// Save the key
	private $key = "YoI6Bp5Oa9";
	private $issuer = "http://appslequar.com/crud_api/";
	private $audience = "http://trainingplus.com";
	private $id = "5152347";
	private $uid = 1;

	public function tokenStatic() {
		$key = "steven";

		$header = [
			'alg' => 'HS256',
			'typ' => 'JWT'
		];

		$header = json_encode( $header );
		$header = base64_encode( $header );

		$payload = [
			'iss' => 'appslequar.com/crud_api/',
			'username' => 'stevenmedina',
			'email' => 'steven@gmail.com'
		];

		$payload = json_encode( $payload );
		$payload = base64_encode( $payload );

		$signature = hash_hmac( "sha256" , "$header.$payload", $key, true );
		$signature = base64_encode( $signature );

		$token = "$header.$payload.$signature";

		return $token;
	}

	public function generateToken() {
		$signer = new Sha256();

		$token = (new Builder())->setIssuer($this->issuer)
								->setAudience($this->audience)
								->setId($this->id, true)
								->setIssuedAt(time())
								->setNotBefore(time() + 60)
								->setExpiration(time() + 3600)
								->set('uid', $this->uid)
								->sign($signer, $this->key )
								->getToken();
		return $token;
	}

	public function validatingToken( $key ) {
		$signer = new Sha256();

		$token = (new Builder())->setIssuer($this->issuer)
								->setAudience($this->audience)
								->setId($this->id, true)
								->setIssuedAt(time())
								->setNotBefore(time() + 60)
								->setExpiration(time() + 3600)
								->set('uid', $this->uid)
								->sign($signer, $this->key )
								->getToken();
		// Verify key
		$result = $token->verify( $signer, $key );

		// Return result => false || true
		return $result;
	}
}
/*
	// Validating key
	// Instantiating Class
	$token = new Token();
	$key = 'YoI6Bp5Oa9';
	$code = $token->validatingToken( $key );
	var_dump( $code );
*/

/*
	$token = new Token();
	$code = $token->generateToken();
	echo( $code );
*/
