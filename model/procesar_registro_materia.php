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
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $id_alumno = $_POST['alumno'];

    // Insertar datos en la tabla 'materias'
    $sql = "INSERT INTO materias (Nombre_Materia, Codigo_Materia, Descripcion, ID_Alumno) 
            VALUES ('$nombre', '$codigo', '$descripcion', '$id_alumno')";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la página de éxito o mostrar un mensaje de éxito
        echo "<script>alert('Materia registrada exitosamente'); window.location.href='../materias.php';</script>";
        exit(); // Detener la ejecución del script después de redirigir
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
