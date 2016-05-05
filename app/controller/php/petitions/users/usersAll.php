<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/webService.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/security/token.php');

$tokenRequest = (isset($_REQUEST['token'])) ? filter_var($_REQUEST['token'], FILTER_SANITIZE_STRING) : null;

// Instantiating Classes
$user = new User();
$webService = new WebService();
$conexion = new Conexion();
$token = new Token();

if ( $tokenRequest === $token->tokenStatic() ) {
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