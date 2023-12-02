<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style-calificaciones.css" />
    <title>Modificar Calificaciones</title>
</head>
<body>
    <h1>Modificar Calificaciones</h1>

    <form method="post" action="model/procesar_modificacion_calificacion.php">
        <label for="alumno">Alumno:</label>
        <select id="alumno" name="alumno" required>
            <?php include 'model/obtener_alumnos.php'; ?>
        </select><br />

        <label for="materia">Materia:</label>
        <select id="materia" name="materia" required>
            <?php include 'model/obtener_materias.php'; ?>
        </select><br />

        <label for="calificacion">Nueva Calificación:</label>
        <input type="number" step="0.01" id="calificacion" name="calificacion" required /><br />

        <input type="submit" value="Guardar Cambios" />
    </form>
</body>
</html>
