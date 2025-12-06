<?php 
require_once "../application/model.php";
$model = new Model;

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $type = $_POST["type"];

    if ($model->addPokemon($name, $type)) {
        header("Location: ../index.php");
        exit;
    } else {
        $mensaje = "Error al adicionar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Adicionar Pokemon</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="p-10">

<h2 class="text-2xl mb-5 font-bold">Adicionar Pokémon</h2>

<form method="POST" class="space-y-4 w-64">

    <input required name="name" placeholder="Nombre" class="input input-bordered w-full">

    <select name="type" class="select select-bordered w-full" required>
        <option value="Water">Water</option>
        <option value="Fire">Fire</option>
        <option value="Grass">Grass</option>
        <option value="Electric">Electric</option>
        <option value="Normal">Normal</option>
        <option value="Ghost">Ghost</option>
        <option value="Poison">Poison</option>
        <option value="Dragon">Dragon</option>
        <option value="Rock">Rock</option>
    </select>

    <button class="btn btn-success w-full">Guardar</button>

</form>

<a href="../index.php" class="btn btn-neutral mt-4">Volver</a>

</body>
</html>
