<?php
// declaracion de clase conexion
	class Conexion extends PDO {
		//declaracion de atributos privados
		private $sgbd='mysql';
		private $host='localhost';
		private $db='crud_api';
		private $usuario='root';
		private $password='';

		//Sobreescribiendo el metodo construtor de la clase PDO
		public function __construct() {
			try {
                parent::__construct($this->sgbd.':host='.$this->host.';dbname='.$this->db, $this->usuario, $this->password);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				print '¡Error en la conexion a la base de datos!<br>'.$e->getMessage().'<br>';
				die();
			}
		}

		public function dml($parameters) {
			try {
				$this->beginTransaction();
				for( $i=0; $i<count( $parameters ); $i++) {
					$sentencia = $this->prepare( $parameters[$i]['consulta'] );
					for( $j=0; $j<count($parameters[$i]['parameter']); $j++ ) {
						for( $k=0; $k<count($parameters[$i]['parameter'][$j] ); $k++) {
							$sentencia->bindParam( ( $k+1 ), $parameters[$i]['parameter'][$j][$k] );
						}
					}
					$sentencia->execute();
				}
				$this->commit();
				// Sentencia para validar si se retorna el ID (PostgreSQL) utilizando RETURNING con el ID.
				/* 
					if( $sentencia->rowCount()>0 ) {
						$operation['result'] = $sentencia->rowCount();
						$returning = $sentencia->fetchAll();
						if( !empty( $returning[0] ) ) {
							$operation['returning']['id'] = $returning[0][0];
						}
					} 
				*/
				$operation['result'] = $sentencia->rowCount();
				$operation['ejecution'] = true;
			} catch( PDOException $e ) {
				$this->rollBack();
				$operation['ejecution'] = false;
				$operation['error'] = $e->getMessage();
			}
			return $operation;
		}

		public function select( $consulta, $parameter ) {
			try {
				$this->beginTransaction();
				$sentencia = $this->prepare( $consulta );
				for( $i=0; $i<count( $parameter ); $i++ ) { $sentencia->bindParam( ( $i+1 ), $parameter[$i] ); }
				$sentencia->execute();
				if( ( $sentencia->rowCount() ) > 0 ) {
					while( $fila=$sentencia->fetch() ) {
						$operation['result'][] = $fila;
					}
				} elseif ( ( $sentencia->rowCount() ) ==0 ) {
					$operation['result'] = $sentencia->rowCount();
				}
				$this->commit();
				$operation['ejecution'] = true;			
			} catch( PDOException $e ) {
				$this->rollBack();
				$operation['ejecution'] = false;
				$operation['error'] = $e->getMessage();
			}
			return $operation;
		}
	}
	/*
		$gbd = new Conexion();
		$consulta = 'SELECT * FROM users WHERE idusers=45;';
		$parameter = array();
		$operation = $gbd->select( $consulta, $parameter );
		print_r( $operation );
	*/
	/*
		$gbd = new Conexion();
		$consulta = 'INSERT INTO usuario (usr_nombre, usr_password, usr_rolusrid, usr_estado) VALUES (?, ?, ?, ?) RETURNING usr_id;';
		$parameter[] = array( 
			0 => 'user', 
			1 => '2527841',
			2 => 1,
			3 => true,
		);
		$parameters[] = array( 
			'consulta' => $consulta,
			'parameter' => $parameter,
		);
		$operation = $gbd->dml($parameters);
		print_r($operation);
	*/
?>