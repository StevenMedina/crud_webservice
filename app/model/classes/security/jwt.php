<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/security/token.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/webService.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/users.php');

$user = new User();
$webService = new WebService();
$conexion = new Conexion();
$token = new Token();

if ( isset( $_GET['token'] ) ) {
	$tokenRequest = (isset($_REQUEST['token'])) ? filter_var($_REQUEST['token'], FILTER_DEFAULT) : null;

	if ( $tokenRequest === $token->tokenUnic() ) {
		$ipUser = $webService->get_client_ip(); // Get ip client
		$headers = array( 'Direccion ip' => $ipUser, 'result' => 'Token valido' ); // Headers to render JSON
		$data = $user::listar( $conexion ); // Get all data
		$array = array('headers' => $headers, 'content' => $data ); // Creating a array with headers and content of post.

		// Creating return in JSON
		header('Content-Type: application/json');
		$users = json_encode( $array );
		echo( $users );
	} else {
		$ipUser = $webService->get_client_ip(); // Get ip client
		$headers = array( 'Direccion ip' => $ipUser, 'result' => 'Token invalido' ); // Headers to render JSON

		// Creating return in JSON
		header('Content-Type: application/json');
		$tokenInvalid = json_encode( $headers );
		echo( $tokenInvalid ); 
	}
} else {
		$ipUser = $webService->get_client_ip(); // Get ip client
		$headers = array( 'Direccion ip' => $ipUser, 'result' => 'No has ingresado el token' ); // Headers to render JSON

		// Creating return in JSON
		header('Content-Type: application/json');
		$tokenInvalid = json_encode( $headers );
		echo( $tokenInvalid ); 
}

// $token_recibido = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhcHBzbGVxdWFyLmNvbVwvY3J1ZF9hcGlcLyIsInVzZXJuYW1lIjoic3RldmVubWVkaW5hIiwiZW1haWwiOiJzdGV2ZW5AZ21haWwuY29tIn0=.UgBDwMxxWbPondllvR37Q+bYsz9lrl7AWajfz/iFCN0=";
// $token= "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhcHBzbGVxdWFyLmNvbVwvY3J1ZF9hcGlcLyIsInVzZXJuYW1lIjoic3RldmVubWVkaW5hIiwiZW1haWwiOiJzdGV2ZW5AZ21haWwuY29tIn0=.UgBDwMxxWbPondllvR37QbYsz9lrl7AWajfz/iFCN0=";

