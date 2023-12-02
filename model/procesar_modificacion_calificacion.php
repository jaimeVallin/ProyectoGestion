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
    $idCalificacion = $_POST['id_calificacion'];
    $idMateria = $_POST['materia'];
    $calificacion = $_POST['calificacion'];

    // Modificar la calificación en la tabla 'calificaciones'
    $sql = "UPDATE calificaciones SET ID_Materia='$idMateria', Calificacion='$calificacion' WHERE ID_Calificacion='$idCalificacion'";

    if ($conn->query($sql) === TRUE) {
        // Mostrar ventana emergente y redirigir
        echo "<script>alert('Calificación modificada exitosamente'); window.location.href='../modificarCalificaciones.php';</script>";
        exit(); // Detener la ejecución del script después de redirigir
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
