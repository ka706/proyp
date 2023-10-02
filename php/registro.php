<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';
$pagina_html = "http://localhost/login/registro.html";
// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['registro'])) {

// Obtener los valores enviados por el formulario
$usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena_usuario'];
$correo = $_POST['correo'];

// Insertamos los datos en la base de datos
$sql = "INSERT INTO usuarios (id_usuario, nombre_usuario, contrasena_usuario, correo) VALUES (null, '$usuario', '$contrasena', '$correo')";
$resultado = mysqli_query($conexion,$sql);
	if($resultado) {
		// Iserción correcta
		echo "¡Se insertaron los datos correctamente!";
	} else {
		// Iserción fallida
		echo "¡No se puede insertar la informacion!"."<br>";
		echo "<a href='$pagina_html'><button>Intentar nuevamente </button></a>";
	}
}
?>
