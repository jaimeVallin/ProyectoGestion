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
    $alumno = $_POST['alumno'];
    $materia = $_POST['materia'];

    // Verificar si ya existe la vinculación
    $sqlVerificar = "SELECT * FROM alumno_materia WHERE ID_Alumno = '$alumno' AND ID_Materia = '$materia'";
    $resultadoVerificar = $conn->query($sqlVerificar);

    if ($resultadoVerificar->num_rows > 0) {
        echo "<script>alert('La vinculación ya existe.'); window.location.href='../vincularAlumnos.php';</script>";
        exit();
    }

    // Insertar datos en la tabla 'alumno_materia'
    $sql = "INSERT INTO alumno_materia (ID_Alumno, ID_Materia) VALUES ('$alumno', '$materia')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Alumno vinculado a materia exitosamente.'); window.location.href='../vincularAlumnos.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
