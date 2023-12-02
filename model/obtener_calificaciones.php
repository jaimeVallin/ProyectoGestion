<?php
// obtener_calificaciones.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capturacalificaciones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$alumnoSeleccionado = $_GET['alumno'];
$materiaSeleccionada = $_GET['materia'];

$sql = "SELECT Calificacion FROM calificaciones WHERE ID_Alumno = '$alumnoSeleccionado' AND ID_Materia = '$materiaSeleccionada'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Calificación: " . $row["Calificacion"] . "</p>";
    }
} else {
    echo "<p>No hay calificaciones para esta materia.</p>";
}

$conn->close();
?>
