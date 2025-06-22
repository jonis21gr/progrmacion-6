<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Salario</title>
    <style>
         /* Estilos generales de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: start;
            padding: 30px;
        }
        /* Contenedor principal del formulario */

        .container {
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }
        /* Título */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
       /* Etiquetas del formulario */
        label {
            display: block;
            margin-top: 10px;
        }
      /* Entradas y menú desplegable */
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Botón de envío */
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
 /* Estilo de la caja que muestra los resultados */
        .resultado {
            margin-top: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            border-left: 5px solid #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Empleado</h2>
       <!-- Se inicia un formulario que enviará datos con el método POST-->
        <form method="POST">
            <label for="nombre">Nombre del empleado:</label>
            <input type="text" name="nombre" required>
<!--Campo de texto para escribir el nombre-->
<!--Campo numérico para las horas trabajadas-->
            <label for="horas">Horas trabajadas:</label>
            <input type="number" name="horas" required min="0">
<!--Lista desplegable con tres categorías-->
            <label for="categoria">Categoría:</label>
            <select name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="administrativo">Administrativo</option>
                <option value="operador">Operador</option>
                <option value="practicante">Practicante</option>
            </select>
<!--Botón que envía el formulario para calcular el salario.-->
            <button type="submit">Calcular</button>
        </form>
        <?php
        //Inicia el bloque PHP. Verifica si el formulario fue enviado por POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);//Se obtienen los valores ingresados. htmlspecialchars protege de código malicioso
            $horas = intval($_POST["horas"]);//. intval convierte a número.
            $categoria = $_POST["categoria"];

              // Determinar el salario por hora según la categoría
              //Se define una variable para guardar el salario por hora según la categoría seleccionada.
            $salarioHora = 0;
            switch ($categoria) {
                case "jefe":
                    $salarioHora = 450;
                    break;
                case "administrativo":
                    $salarioHora = 350;
                    break;
                case "operador":
                    $salarioHora = 250;
                    break;
                case "practicante":
                    $salarioHora = 150;
                    break;
                default:
                    echo "<p>Error: Categoría no válida.</p>";
                    exit;
            }
//Se calcula el salario bruto, el descuento del 10%, y el salario neto.
            $salarioBruto = $salarioHora * $horas;
            $descuento = $salarioBruto * 0.10; // 10% de descuento
            $salarioNeto = $salarioBruto - $descuento;
//Muestra los resultados dentro de una caja con clase resultado, con formato de moneda
            echo "<div class='resultado'>";
            echo "<strong>Nombre:</strong> $nombre<br>";
            echo "<strong>Horas trabajadas:</strong> $horas<br>";
            echo "<strong>Salario bruto:</strong> $" . number_format($salarioBruto, 2) . "<br>";
            echo "<strong>Descuento (10%):</strong> $" . number_format($descuento, 2) . "<br>";
            echo "<strong>Salario neto:</strong> $" . number_format($salarioNeto, 2);
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
