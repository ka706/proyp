<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';
$pagina_html = "http://localhost/login/login.html";
// Validamos que el formulario y que el boton login haya sido presionado
if(isset($_POST['login'])) {

// Obtener los valores enviados por el formulario
$usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena_usuario'];

// Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' and contrasena_usuario= '$contrasena'";
$resultado = mysqli_query($conexion,$sql);
$numero_registros = mysqli_num_rows($resultado);
	if($numero_registros != 0) {
		// Inicio de sesión exitoso
		header('Location: http://localhost/login/libros.html');
	} else {
		// Credenciales inválidas
		echo "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña, por favor vuelva intentarlo."."<br>";
		echo "<a href='$pagina_html'><button>Intentar nuevamente </button></a>";
	}
}

?>
