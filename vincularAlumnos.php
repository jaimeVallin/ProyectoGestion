<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style-vinculacion.css" />
    <title>Información Académica</title>
</head>

<body>
</div>
    <h2>Vincular Alumno a Materia</h2>
    <form action="model/vincular_alumno_materia.php" method="post">
        <label for="alumno">Alumno:</label>
        <select id="alumno" name="alumno" required>
            <?php include 'model/obtener_alumnos.php'; ?>
        </select><br />

        <label for="materia">Materia:</label>
        <select id="materia" name="materia" required>
            <?php include 'model/obtener_materias.php'; ?>
        </select><br />

        <input type="submit" value="Vincular Alumno a Materia" />
    </form>

    <h1>Información Académica</h1>
    <div class="parent">

        
        <div class="son">
        <h2>Materias</h2>
            <?php include 'model/obtener_materias.php'; ?>
        </div>

        <div class="son">
            <h2>Alumnos Registrados</h2>
            <p>
                <?php include 'model/obtener_alumnos.php'; ?> alumnos registrados.
            </p>
        </div>

   
</body>

</html>