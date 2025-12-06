<?php
require_once "../application/model.php";
$model = new Model;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (!isset($_POST["id"])) {
        exit("ID no recibido");
    }

    $id = $_POST["id"];

    if ($model->deletePokemon($id)) {
        // No redirige, solo recarga la tabla
        header("Location: ../index.php");
        exit;
    } else {
        exit("Error al eliminar");
    }
}

echo "Acceso no permitido";
?>
