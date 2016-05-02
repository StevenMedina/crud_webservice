<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/crud_api/app/model/connection.php');

class Post {
	private $id; 
	private $name;
	private $description;
	private $date;

	public function getID() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getDate() {
		return $this->date;
	}

	public static function listar( $conexion ) {
		$consulta='SELECT * FROM post;';	
		$parameter = array();
		$operation = $conexion->select( $consulta, $parameter );
		if( $operation['ejecution'] ) {
			if( $operation['result'] ) {
				$i = 0;
				foreach( $operation['result'] as $fila ) {
					$resultado[$i]['id'] = $fila['idPost'];
					$resultado[$i]['name'] = $fila['name'];
					$resultado[$i]['description'] = $fila['description'];
					$resultado[$i]['date'] = $fila['date'];
					$i++;
				}
				$operation['result'] = $resultado;
			}
		}
		return $operation;
	}

	public static function registrar( $name, $description, $date, $conexion ) {
		$consulta='INSERT INTO post ( name, description, date ) values ( ?,?,? )';
		$parameter[] = array(
			0=>$name,
			1=>$description,
			2=>$date
		);

		$parameters[] = array( 'consulta' => $consulta,'parameter' => $parameter );
		$operation = $conexion->dml( $parameters );
		return $operation;
	}

	public function modificar( $name, $description, $date, $conexion ) {
		$consulta = 'UPDATE post SET name=?, description=?, date=? WHERE idPost=?;';
		$parameter[] = array(
			0=>$name,
			1=>$description,
			2=>$date
		);

		$parameters[] = array('consulta' => $consulta,  'parameter' => $parameter );
		$operation = $conexion->dml($parameters);
		return $operation;
	}

	public function eliminar( $conexion ) {
		$consulta = 'DELETE FROM post WHERE idPost=?;';
		$parameter[] = array( 0 => $this->id );

		$parameters = array('consulta' => $consulta, 'parameter' => $parameter );
		$operation = $conexion->dml($parameters);
		return $operation;
	}
}
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