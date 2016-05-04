<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/webService.php');

// Get 'id' by URL
$id = (isset($_REQUEST['id'])) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING) : null;

// Instantiating Classes
$user = new User();
$webService = new WebService();
$conexion = new Conexion();

// Get ip client
$ipUser = $webService->get_client_ip();

// Headers to render JSON
$headers = array( 'Direccion ip' => $ipUser );

// Get all data
$datauser = $user::getUserByID( $id, $conexion );

if ( $datauser['result'] != 0 ) {
	// Creating a array with headers and content of post.
	$array = array('headers' => $headers, 'content' => $datauser );
	// Creating return in JSON
	header('Content-Type: application/json');

	$response = json_encode( $array );
	echo( $response );
} else {
	$noRequest = array('no result by id: ' => $id );
	$array = array('headers' => $headers, 'content' => $noRequest );
	// Creating return in JSON
	header('Content-Type: application/json');

	$response = json_encode( $array );
	echo( $response );
}
