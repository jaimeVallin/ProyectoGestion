<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style-calificaciones.css" />
    <title>Calificaciones alumnos</title>
</head>

<body>
    <h1>Lista de Alumnos y Materias</h1>
    <div class="papa">
        <h2>Alumnos:</h2>
        <select id="alumnos" name="alumnos" required onchange="cargarMaterias()">
            <?php include 'model/obtener_alumnos.php'; ?>
        </select>

        <h2>Materias:</h2>
        <select id="materias" name="materias" required onchange="cargarCalificaciones()">
            <!-- Materias se cargarán dinámicamente aquí -->
        </select>

        <h2>Calificaciones:</h2>
        <div id="calificaciones">
            <!-- Calificaciones se cargarán dinámicamente aquí -->
        </div>

        <script>
            function cargarMaterias() {
                var alumnoSeleccionado = document.getElementById("alumnos").value;

                // Hacer una solicitud AJAX para obtener las materias del alumno seleccionado
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("materias").innerHTML = this.responseText;
                        // Al cargar las materias, también cargamos las calificaciones para la primera materia
                        cargarCalificaciones();
                    }
                };
                xhr.open("GET", "model/obtener_materias_alumno.php?alumno=" + alumnoSeleccionado, true);
                xhr.send();
            }

            function cargarCalificaciones() {
                var alumnoSeleccionado = document.getElementById("alumnos").value;
                var materiaSeleccionada = document.getElementById("materias").value;

                // Hacer una solicitud AJAX para obtener las calificaciones del alumno y materia seleccionados
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("calificaciones").innerHTML = this.responseText;
                    }
                };
                xhr.open("GET", "model/obtener_calificaciones.php?alumno=" + alumnoSeleccionado + "&materia=" + materiaSeleccionada, true);
                xhr.send();
            }
        </script>
        <input
        type="button"
        value="Registrar alumnos"
        onclick="window.location.href='alumnos.html'">
        <input
        type="button"
        value="Registrar materia"
        onclick="window.location.href='materias.php'">

    </div>
</body>

</html>