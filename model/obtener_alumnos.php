<?php
// obtener_alumnos.php
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

$sql = "SELECT ID_Alumno, Nombre, Apellido FROM alumnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<option value=\"" . $row["ID_Alumno"] . "\">" . $row["Nombre"] . " " . $row["Apellido"] . "</option>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
