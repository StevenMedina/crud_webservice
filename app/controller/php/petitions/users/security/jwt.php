<?php 

function token() {
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

$token_recibido = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhcHBzbGVxdWFyLmNvbVwvY3J1ZF9hcGlcLyIsInVzZXJuYW1lIjoic3RldmVubWVkaW5hIiwiZW1haWwiOiJzdGV2ZW5AZ21haWwuY29tIn0=.UgBDwMxxWbPondllvR37Q+bYsz9lrl7AWajfz/iFCN0=";

if ( $token_recibido === token() ) {
	echo "Siga!";
} else {
	echo "Lo siento";
}
