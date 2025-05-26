<?php //abrimos la sintaxis de php
//con las sigueinte variables mandamos a traer los datos del formulario de html mediane el metodo que utilizamos
//que es el meodo post para agregar variables utilizamos este signo "$" 
$nombre = $_POST['nombre'];// lo que esta en las comillas simple es como esta guardado en el documento de formulario html
$edad = (int) $_POST['edad']; //en la edad marcamos que el tipo de variable es entera
$tipo = $_POST['tipo'];
$sala = $_POST['sala'];
//esta siguene linea es para saber si la persona traer su crencial
$credencial = isset($_POST['credencial']) && $_POST['credencial'] === 'si';
//esta variable solo es para guardar el precio de la sala
$precio_base = 0;

// Switch para asignar el precio de la sala en cada "case" que abrimos ponemos los preciosde la sala que es
switch ($sala) {
    case "normal":
        $precio_base = 70;
        break;
    case "2d":
        $precio_base = 85;
        break;
    case "3d":
        $precio_base = 100;
        break;
    case "vip":
        $precio_base = 150;
        break;
        //ponemos un "default" por si no llega a existir una sala
    default:
        echo "Sala no válida.";
        exit;
}
//esta variable es para guardar si ahi algun descuento
$descuento = 0;

// Aplicar descuentos usando if con los datos de como es la persona se aplicara el decueb=nro
if ($tipo === "estudiante" && $credencial) {
    $descuento = 0.50;
} elseif ($tipo === "adulto_mayor" && $edad >= 65 && $credencial) {
    $descuento = 0.50;
} elseif ($edad < 18) {
    $descuento = 0.35;
} else {
    $descuento = 0.0;
}
// utilizamos una variable para guardar el precio final donde utilizamos una opercaion maematica para poder hacer el descuento
$precio_final = $precio_base - ($precio_base * $descuento);
$precio_final = number_format($precio_final, 2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(244, 244, 244);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .ticket {
            background: white;
            padding: 20px 30px;
            width: 320px;
            border: 2px dashed #333;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .ticket h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket .row {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
            font-size: 16px;
        }

        .ticket .label {
            font-weight: bold;
        }

        .ticket .total {
            margin-top: 15px;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
        }

        .ticket::after {
            content: "";
            display: block;
            margin: 20px auto 0;
            width: 100%;
            height: 1px;
            background: #ccc;
            
        }
        .ticket .center-strip {
    background-color:rgb(145, 240, 251);
    height: 60px;
    margin: 15px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
    border-radius: 8px;
}
.ticket {
    background: white;
    padding: 20px 30px;
    width: 320px;
    border: 2px dashed #333;
    box-shadow: 0 0 10px rgba(10, 234, 215, 0.84);
    position: relative; /* Necesario para posicionar el pseudo-elemento */
}

    </style>
</head>
<body>
    <div class="ticket">
        <h2>🎟️ Ticket de Compra 🎟️</h2> <!--es un titulo para el documento -->

        <div class="row"><div class="label">Nombre:</div><div><?php echo htmlspecialchars($nombre); ?></div></div> <!-- se pone la variable para mosrar el dato htmlspecialchars() se usa para evitar errores si el usuario pone caracteres especiales  -->
        <div class="row"><div class="label">Edad:</div><div><?php echo $edad; ?> años</div></div>
        <!-- el "str_replace('_', ' ', $tipo)" reemplaza el guion bajo con un espacio si el valor es "adulto_mayor"
🔹 ucfirst() convierte la primera letra en mayúscula para que se vea más bonito.-->
        <div class="row"><div class="label">Tipo:</div><div><?php echo ucfirst(str_replace('_', ' ', $tipo)); ?></div></div>
        <div class="row"><div class="label">Sala:</div><div><?php echo ($sala); ?></div></div>
        <div class="row"><div class="label">Precio base:</div><div>$<?php echo $precio_base; ?></div></div>
        <div class="row"><div class="label">Descuento:</div><div><?php echo $descuento * 100; ?>%</div></div>
        <div class="center-strip">¡Gracias por su compra!</div>
        <div class="total">Total a pagar: $<?php echo $precio_final; ?></div>
    </div>
</body>
</html>