<?php
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

// Obtener datos de alumnos
$sql = "SELECT ID_Alumno, Nombre, Apellido FROM alumnos";
$result = $conn->query($sql);

// Imprimir opciones del select
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $selected = isset($_POST['alumno']) && $_POST['alumno'] == $row['ID_Alumno'] ? 'selected' : '';
        echo "<option value='" . $row['ID_Alumno'] . "' $selected>" . $row['Nombre'] . " " . $row['Apellido'] . "</option>";
    }
}

// Cerrar conexión
$conn->close();
?>
