<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/webService.php');

$response = array();

// Instantiating Classes
$user = new User();
$webService = new WebService();
$conexion = new Conexion();

// Get ip client
$ipUser = $webService->get_client_ip();
// Headers to render JSON
$headers = array( 'Direccion ip' => $ipUser );

$name = (isset($_REQUEST['name'])) ? filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : null;
$user = (isset($_REQUEST['user'])) ? filter_var($_REQUEST['user'], FILTER_SANITIZE_STRING) : null;
$password = (isset($_REQUEST['password'])) ? filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING) : null;
$city = (isset($_REQUEST['city'])) ? filter_var($_REQUEST['city'], FILTER_SANITIZE_STRING) : null;
$phone = (isset($_REQUEST['phone'])) ? filter_var($_REQUEST['phone'], FILTER_SANITIZE_STRING) : null;

if ( $name != null and $user != null and $password != null and $city != null and $phone != null ) {
	try {
		$conexion = new Conexion();

		$password_cript = base64_encode($password);
		$operation = User::registrar( $name, $user, $password_cript, $city, $phone, $conexion );

		if( ( $operation['ejecution'] ) && ( $operation['result']) ) {
			$response['message'] = "Se registro correctamente la información.";
			$response['success'] = true;

			$array = array('headers' => $headers, 'content' => $response['message'], 'success' => $response['success']);
			header('Content-Type: application/json');

			$response = json_encode( $array );
			echo( $response );
		} else {
			$response['message'] = "Error al registrar la información.";
			$response['success'] = false;
		}
	} catch ( Exception $e  ) {
		$response['message'] = "Error register";
		$response['success'] = false;
	}
} else {
	$noRequest = array( 'status' => 'No information to register' );
	$array = array( 'headers' => $headers, 'content' => $noRequest );
	// Creating return in JSON
	header('Content-Type: application/json');

	$response = json_encode( $array );
	echo( $response );
}