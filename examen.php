<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $genero = $_POST["genero"];
 $materia = $_POST["materia"];
    $c1 = $_POST["c1"];
    $c2 = $_POST["c2"];
    $c3 = $_POST["c3"];

    // Promedio
    $promedio = ($c1 + $c2 + $c3) / 3;

    // Determinar estatus
    if ($promedio <= 69) {
        $estatus = "Reprobado";
        $colorEstatus = "#e74c3c";  // rojo
    } elseif ($promedio >= 70 && $promedio <= 95) {
        $estatus = "Ordinario";
        $colorEstatus = "#f39c12";  // naranja
    } elseif ($promedio >= 96) {
        $estatus = "Exento";
        $colorEstatus = "#27ae60";  // verde
    }
    ?>
   <style>
    .resultado {
        background: linear-gradient(135deg, #e74c3c 0%, #f5f5dc 100%); /* rojo a beige */
        border-radius: 15px;
        padding: 25px 30px;
        width: 320px;
        margin: 20px auto;
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #1b1b1b; /* texto oscuro para contraste con beige */
    }

    .resultado h3 {
        text-align: center;
        margin-bottom: 20px;
        font-weight: 700;
        color: #800000; /* rojo oscuro */
        text-shadow: 1px 1px 2px #fff;
    }

    .resultado strong {
        display: inline-block;
        width: 100px;
        color: #800000;
    }

    .estatus {
        font-weight: 700;
        font-size: 1.3em;
        color: <?= $colorEstatus ?>;
        text-align: center;
        margin-top: 15px;
        text-shadow: 1px 1px 2px #00000050;
    }
</style>

    <div class="resultado">
        <h3>Resultado</h3>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Género:</strong> <?= htmlspecialchars($genero) ?></p>
        <p><strong>Materia:</strong> <?= htmlspecialchars($materia) ?></p>
        <p><strong>Calificaciones:</strong> <?= htmlspecialchars("$c1, $c2, $c3") ?></p>
        <p><strong>Promedio:</strong> <?= round($promedio, 2) ?></p>
        <p class="estatus"><?= $estatus ?></p>
    </div>
<?php
}
?>