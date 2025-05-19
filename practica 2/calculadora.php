<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(159, 159, 244);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .calculadora {
            background-color: pink;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }

        input, select, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }

        button {
            background-color:rgb(196, 0, 235);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color:rgb(248, 190, 234);
        }

        .resultado {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculadora">
        <h1>CALCULADORA</h1>
        <form method="POST">
            <input type="number" name="num1" placeholder="Primer número" required>
            <input type="number" name="num2" placeholder="Segundo número" required>
            <select name="operacion">
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
            <button type="submit">CALCULAR</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operacion = $_POST['operacion'];
            $resultado = 0;
            $simbolo = "";

            switch ($operacion) {
                case "suma":
                    $resultado = $num1 + $num2;
                     $simbolo = "+";
                    break;
                case "resta":
                    $resultado = $num1 - $num2;
                     $simbolo = "-";
                    break;
                case "multiplicacion":
                    $resultado = $num1 * $num2;
                     $simbolo = "*";
                    break;
                case "division":
                    if ($num2 != 0) {
                        $resultado = $num1 / $num2;
                         $simbolo = "/";
                    } 
                   
            }

            echo "<div class='resultado'>Resultado: $num1 $simbolo $num2 = $resultado</div>";
        }
        ?>
    </div>
</body>
</html>