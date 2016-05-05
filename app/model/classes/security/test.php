<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/vendor/autoload.php');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

$key = "steven";
$signer = new Sha256();

$token = (new Builder())->setIssuer('http://appslequar.com/crud_api/') // Configures the issuer (iss claim)
                        ->setAudience('http://training+.com') // Configures the audience (aud claim)
                        ->setId('5152347', true) // Configures the id (jti claim), replicating as a header item
                        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
                        ->setExpiration(time() + 3600) // Configures the expiration time of the token (exp claim)
                        ->set('uid', 1) // Configures a new claim, called "uid"
                        ->sign($signer, 'steven')
                        ->getToken(); // Retrieves the generated toke

print_r($token->getHeaders()); // Retrieves the token headers
print_r($token->getClaims()); // Retrieves the token claims

// echo $token; // The string representation of the object is a JWT string (pretty easy, right?)

// Codificar a base 64
// $tokenCode = base64_encode( $token );
// echo $tokenCode;

// Decodificar a string normal
// $tokenDecode = base64_decode( $tokenCode );
// echo $tokenDecode;