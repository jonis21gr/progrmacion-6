<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar Interactiva</title>
    <style>
  /* Estilos generales para el cuerpo de la página */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #e0f7fa, #fff3e0);
    padding: 30px;
    text-align: center;
}

/* Título principal */
h2 {
    margin-bottom: 20px;
    color: #ff5722;
}

/* Espaciado entre el formulario y los botones */
form {
    margin-bottom: 30px;
}

/* Estilo de los botones */
button {
    margin: 5px;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #ff4081;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: background-color 0.3s, transform 0.2s;
}

/* Efecto al pasar el mouse sobre los botones */
button:hover {
    background-color: #e91e63;
    transform: scale(1.05);
}

/* Contenedor de la tabla */
.tabla {
    max-width: 400px;
    margin: 0 auto;
    background-color: white;
    border: 2px solid #ff9800;
    border-radius: 10px;
    box-shadow: 3px 3px 15px rgba(0,0,0,0.2);
    overflow: hidden;
}

/* Encabezado de la tabla */
.tabla h3 {
    background-color: #ff9800;
    color: white;
    padding: 12px;
    margin: 0;
    font-size: 18px;
}

/* Estilo de la tabla HTML */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Celdas de la tabla */
td {
    padding: 10px;
    border-top: 1px solid #ddd;
    font-size: 15px;
}

/* Primera columna de cada fila: fórmula */
td:first-child {
    background-color: #fff8e1;
    font-weight: bold;
    color: #f57c00;
}

    </style>
</head>
<body>
<!-- Título de la página -->
<h2>Selecciona una tabla de multiplicar</h2>

<form method="post">
    <?php
     // Crea botones del 1 al 10 usando for
    for ($i = 1; $i <= 10; $i++) {
        // Genera un botón que al presionar envía el número de la tabla seleccionada
        echo "<button type='submit' name='tabla' value='$i'>Tabla del $i</button>";
    }
    ?>
</form>

<?php
// Verifica si se ha enviado el formulario (POST) y obtiene el número
if (isset($_POST['tabla'])) {
    $num = intval($_POST['tabla']); // convierte el valor recibido en número
      // Muestra la tabla de multiplicar con bucle for
    echo "<div class='tabla'>";
    echo "<h3>Tabla del $num</h3>";
    echo "<table>";
    // Inicia un ciclo for desde 1 hasta 10
    for ($j = 1; $j <= 10; $j++) {
        echo "<tr><td>$num x $j</td><td>" . ($num * $j) . "</td></tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>

<!-- Segundo formulario usando bucle do...while -->
<form method="post">
    <?php
      // Crea botones del 1 al 10 con do...while
    $n = 1;
    do {
         // Genera un botón que al presionar envía el número de la tabla seleccionada
        echo "<button type='submit' name='tabla' value='$n'>Tabla del $n</button>";
        $n++;//incremento
    } while ($n <= 10);
    ?>
</form>

<?php
// Verifica si se ha enviado el formulario (POST) y obtiene el número
if (isset($_POST['tabla'])) {//isset() verifica que esa variable existe, es decir, que el usuario envió un número.
    $num = intval($_POST['tabla']);//isset() verifica que esa variable existe, es decir, que el usuario envió un número.
    echo "<div class='tabla'>";
    echo "<h3>Tabla del $num</h3>";
    echo "<table>";

    $j = 1;
    do {
        echo "<tr><td>$num x $j</td><td>" . ($num * $j) . "</td></tr>";
        $j++;
    } while ($j <= 10);

    echo "</table>";
    echo "</div>";
}
?>
</body>
</html>
