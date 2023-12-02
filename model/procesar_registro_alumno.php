<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (reemplaza estos valores con los tuyos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "capturacalificaciones";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $direccion = $_POST['direccion'];

    // Validar que los valores no estén vacíos
    if (empty($nombre) || empty($apellido) || empty($fechaNacimiento)) {
        die("Todos los campos obligatorios deben ser completados.");
    }

    // Insertar datos en la tabla 'alumnos'
    $sql = "INSERT INTO alumnos (Nombre, Apellido, Fecha_Nacimiento, Direccion) 
            VALUES ('$nombre', '$apellido', '$fechaNacimiento', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        // Mostrar ventana emergente
        echo "<script>alert('Alumno registrado'); window.location.href='../alumnos.html';</script>";
        exit(); // Detener la ejecución del script después de redirigir
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se ha enviado el formulario de manera correcta, redireccionar a la página principal
    header("Location: registro_alumnos.html");
    exit();
}
?>
