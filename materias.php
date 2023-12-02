<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style-calificaciones.css" />
    <title>Registro de Materias</title>
</head>

<body>
    <h1>Registro de Materias</h1>

    <form action="model/procesar_registro_materia.php" method="post">
        <label for="nombre">Nombre de la Materia:</label>
        <input type="text" id="nombre" name="nombre" required /><br />

        <label for="codigo">Código de la Materia:</label>
        <input type="text" id="codigo" name="codigo" required /><br />

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4"></textarea><br />

        <label for="alumno">Asociar con Alumno:</label>
        <select id="alumno" name="alumno" required>
            <?php 
            include 'model/obtener_alumnos.php';
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_Alumno'] . "'>" . $row['Nombre'] . " " . $row['Apellido'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay alumnos disponibles</option>";
            }
            ?>
        </select><br />

        <input type="submit" value="Guardar" />
    </form>
</body>

</html>
