<?php
$alumnoSeleccionado = $_GET['alumno'];
echo "ID del Alumno Seleccionado: " . $alumnoSeleccionado;
// obtener_materias_alumno.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capturacalificaciones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$alumnoSeleccionado = $_GET['alumno'];

$sql = "SELECT ID_Materia, Nombre_Materia FROM materias WHERE ID_Alumno = $alumnoSeleccionado";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<option value=\"" . $row["ID_Materia"] . "\">" . $row["Nombre_Materia"] . "</option>";
    }
} else {
    echo "<option value=''>Este alumno no tiene materias registradas</option>";
}

$conn->close();
?>
