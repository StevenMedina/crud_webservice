<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/connection.php');

class User {
	private $id; 
	private $name;
	private $user;
	private $password;
	private $city;
	private $phone;

	public function getID() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getUser() {
		return $this->user;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getCity() {
		return $this->city;
	}

	public function getPhone() {
		return $this->phone;
	}

	public static function listar( $conexion ) {
		$consulta='SELECT * FROM users;';	
		$parameter = array();
		$operation = $conexion->select($consulta, $parameter);
		if( $operation['ejecution'] ) {
			if( $operation['result'] ) {
				$i = 0;
				foreach( $operation['result'] as $fila ) {
					$resultado[$i]['id'] = $fila['idusers'];
					$resultado[$i]['name'] = $fila['name'];
					$resultado[$i]['user'] = $fila['user'];
					$resultado[$i]['password'] = $fila['password'];
					$resultado[$i]['city'] = $fila['city'];
					$resultado[$i]['phone'] = $fila['phone'];
					$i++;
				}
				$operation['result'] = $resultado;
			}
		}
		return $operation;
	}

	public static function getUserByID( $id, $conexion ) {
		$consulta = "SELECT * FROM users WHERE idusers = ?;";
		$parameter = array( 0 => $id );

		$operation = $conexion->select( $consulta, $parameter );

		if( $operation['ejecution'] ) {
			if( $operation['result'] ) {
				$i = 0;
				foreach( $operation['result'] as $fila ) {
					$resultado[$i]['id'] = $fila['idusers'];
					$resultado[$i]['name'] = $fila['name'];
					$resultado[$i]['user'] = $fila['user'];
					$resultado[$i]['password'] = $fila['password'];
					$resultado[$i]['city'] = $fila['city'];
					$resultado[$i]['phone'] = $fila['phone'];
					$i++;
				}
				$operation['result'] = $resultado;
			}
		}
		return $operation;
	}

	public static function registrar( $name, $user, $password, $city, $phone, $conexion ) {
		$consulta='INSERT INTO users ( name, user, password, city, phone ) values ( ?,?,?,?,? )';
		$parameter[] = array(
			0=>$name,
			1=>$user,
			2=>$password,
			3=>$city,
			4=>$phone
		);

		$parameters[] = array( 'consulta' => $consulta,'parameter' => $parameter );
		$operation = $conexion->dml($parameters);
		return $operation;
	}

	public function modificar( $name, $user, $password, $city, $phone, $conexion ) {
		$consulta = 'UPDATE users SET name=?, user=?, password=?, city=?, phone=? WHERE idusers=?;';
		$parameter[] = array(
			0=>$name,
			1=>$user,
			2=>$password,
			3=>$city,
			4=>$phone
		);

		$parameters[] = array('consulta' => $consulta,  'parameter' => $parameter );
		$operation = $conexion->dml($parameters);
		return $operation;
	}

	public function eliminar( $id, $conexion ) {
		$consulta = 'DELETE FROM users WHERE idusers=?;';
		$parameter[] = array( 0 => $id );

		$parameters = array('consulta' => $consulta, 'parameter' => $parameter );
		$operation = $conexion->dml($parameters);
		return $operation;
	}
}
	/* 
	$user = new User();
	$conexion = new Conexion();

	$data = $user->eliminar( 42, $conexion );
	var_dump( $data );
	*/
	/*
	$UserID = new User();
	$conexion = new Conexion();

	$dato = $UserID->getUserByID( 42, $conexion );
	var_dump( $dato );
	*/
	/*
		$user = new User();
		$conexion = new Conexion();
		$data = $user->eliminar( $conexion );
		var_dump( $data );
	*/
	/*
		$user = new User();
		$conexion = new Conexion();
		$data = $user::listar( $conexion );
		$dataJson = json_encode( $data );
		var_dump( $dataJson );
	*/
	/*
		$conexion = new Conexion();
		$operation = User::registrar( 'Steven','Sweet','123123123','Bogota','123123123', $conexion );
		print_r($operation);
	*/
	/*
		$conexion = new Conexion();
		$operation = Persona::registrar('Steven','Sweet','123123123','Bogota','123123123', $conexion);
		print_r($operation);
		INSTANCIAR PERSONA
		$conexion = new Conexion();
		$persona = new Persona('1018429154',$conexion);
		echo $persona->getNombre();
		$ciudad = $persona->getCiudad();
		echo $ciudad->getNombre();
		MODIFICAR PERSONA
		1. Instanciar el objeto persona
		-> $operation = $persona->modificar('MARIA','FERNANDA','CEDULA DE CIUDADANIA','1018429157','11001','TRANSVERSAL 34','8077841',$conexion);
		-> print_r($operation);
	*/