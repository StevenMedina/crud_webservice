<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/classes/security/token.php');

$token = new Token();
$code = $token->generateToken();

echo( $code );