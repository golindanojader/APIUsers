<?php 


// echo 'Informacion:'.file_get_contents('php://input');
// 

header("Content-Type:application/json");

include_once "../clases/class-usuario.php";

switch ($_SERVER['REQUEST_METHOD']) {
	
	// GUARDAR
	case 'POST':
		
		$_POST= json_decode(file_get_contents('php://input'), true);

		$usuario = new usuario($_POST["nombre"],$_POST["apellido"],$_POST["fechaNacimiento"],$_POST["pais"]);
		$usuario->guardarUsuario();

		$resultado["mensaje"]= 'Guardar usuario, informacion: '.json_encode($_POST, true);

		echo json_encode($resultado);
		
		break;
	
	case 'GET':
		if(isset($_GET['id'])){

			usuario::obtenerUsuario($_GET['id']);

		}else{


			usuario::obtenerUsuarios();
		}
		
		break;


	case 'PUT':
		
		$_PUT= json_decode(file_get_contents('php://input'), true);

		$usuario = new usuario($_PUT['nombre'],$_PUT['apellido'],$_PUT['fechaNacimiento'],$_PUT['pais']);
		$usuario->actualizarUsuario($_GET["id"]);

		$resultado["mensaje"]= 'Actualizar el usuario con el id:'.$_GET['id']. 'Informacion a actualizar'.json_encode($_PUT);

		echo json_encode($resultado);
		break;


		case 'DELETE':

		usuario::eliminarUsuario($_GET["id"]);
		
		$resultado["mensaje"]= "Eliminar usuario con el id:  ".$_GET["id"];

		echo json_encode($resultado);
		break;
	
}

// CREAR
// 


// OBTENER USUARIO




// OBTENER TODOS LOS USUARIOS





// ACTUALIZAR UN USUARIO
// 



// ELEIMINAR UN USUARIO
 ?>