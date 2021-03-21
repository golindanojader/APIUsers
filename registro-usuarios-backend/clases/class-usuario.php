<?php 

	class usuario{


		private $nombre;
		private $apellido;
		private $fechaNacimiento;
		private $pais;
	

		  public function __construct($nombre, $apellido,$fechaNacimiento, $pais){

		  	$this->nombre = $nombre;
		  	$this->apellido = $apellido;
		  	$this->fechaNacimiento=$fechaNacimiento;
		  	$this->pais = $pais;


		  }


		  public function getNombre(){

		  	return $this->nombre;
		  }



		    public function setNombre($nombre){

		  	return $this->nombre;
		  }



		    public function getApellido(){



		    }


		      public function setApellido($apellido){

		      	return $this->apellido = $apellido;

		      	return $this;
		      }



		        public function getfechaNacimiento(){

		        return $this->fechaNacimiento;

		        }



		          public function setfechaNacimiento(){


		          	$this->fechaNacimiento = $fechaNacimiento;

		          	return $this;

		          }

		          public function getpais(){


		          	return $this->pais;
		          }


		          public function setpais($pais){

		          	$this->pais=$pais;
		          	return $this;

		          }

		          public function __toString(){


		          	return $this->nombre ."".$this->apellido."(".$this->fechaNacimiento.",".$this->pais.")";
		          }

		         	// CRUD
		         	// 
		        
		        	public function guardarUsuario(){

		        		$contenidoArchivo = file_get_contents("../data/usuarios.json");
		        		$usuarios = json_decode($contenidoArchivo, true);

		        		$usuarios[]= array(

		        			"nombre"=>$this->nombre,
		        			"apellido"=>$this->apellido,
		        			"fechaNacimiento"=>$this->fechaNacimiento,
		        			"pais"=>$this->pais
		        		);

		        		$archivo = fopen("../data/usuarios.json","w");

		        		fwrite($archivo, json_encode($usuarios));

		        		fclose($archivo);

		        	}

		        	public static function obtenerUsuarios(){
		        	
		        	$contenidoArchivo = file_get_contents("../data/usuarios.json");

		        	echo $contenidoArchivo;
		        	
		        	

		        	}

		        	public static function obtenerUsuario($indice){
		        	
		        	$contenidoArchivo = file_get_contents("../data/usuarios.json");

		        	$usuarios = json_decode($contenidoArchivo, true);

		        	echo json_encode($usuarios[$indice]);

		        	
		        	
		        	

		        	}

		        	public function actualizarUsuario($indice){

		        	$contenidoArchivo = file_get_contents("../data/usuarios.json");

		        	$usuarios = json_decode($contenidoArchivo, true);

		        	// $usuario = $usuarios[$indice];
		        	
		        	$usuario = array('nombre'=>$this->nombre,
		        					'apellido'=>$this->apellido,
		        					'fechaNacimiento'=>$this->fechaNacimiento,
		        					'pais'=>$this->pais);


		        	$usuarios[$indice] = $usuario;

		        	$archivo = fopen('../data/usuarios.json','w');

		        	fwrite($archivo, json_encode($usuarios));

		        	fclose($archivo);
		        


		        	}

		        	public static function eliminarUsuario($indice){

		        	$contenidoArchivo = file_get_contents("../data/usuarios.json");

		        	$usuarios = json_decode($contenidoArchivo, true);

		        	array_splice($usuarios, $indice, 1);

		        	$archivo = fopen('../data/usuarios.json','w');

		        	fwrite($archivo, json_encode($usuarios));

		        	fclose($archivo);
			        		
		        	}

			}





 ?>