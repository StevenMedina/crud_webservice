<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/posts.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/webService.php');

// instantiating classes
$post = new Post();
$webService = new WebService();
$conexion = new Conexion();

// Get ip client
$ipUser = $webService->get_client_ip();

// Headers to render JSON
$headers = array( 'Direccion ip' => $ipUser );

// Get all data
$data = $post::listar( $conexion );

// Creating a array with headers and content of post.
$array = array('headers' => $headers, 'content' => $data );

// Creating return in JSON
header('Content-Type: application/json');
$posts = json_encode( $array );
echo( $posts );