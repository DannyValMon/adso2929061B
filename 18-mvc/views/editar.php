<?php
require_once "../application/model.php";
$model = new Model;

$id = $_GET["id"] ?? null;
if (!$id) { die("ID no encontrado"); }

$pokemon = $model->getPokemon($id);
if (!$pokemon) { die("Pokémon no existe"); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $type = $_POST["type"];

    if ($model->updatePokemon($id, $name, $type)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error al actualizar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Pokémon</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="p-10">

<h2 class="text-2xl font-bold mb-5">Editar Pokémon</h2>

<form method="POST" class="space-y-4 w-64">

    <input name="name" value="<?= $pokemon['name'] ?>" class="input input-bordered w-full">

    <select name="type" class="select select-bordered w-full">
        <?php
        $types = ["Water","Fire","Grass","Electric","Normal","Ghost","Poison","Dragon","Rock"];
        foreach ($types as $t):
        ?>
            <option value="<?= $t ?>" <?= $t == $pokemon['type'] ? 'selected' : '' ?>>
                <?= $t ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-warning w-full">Actualizar</button>

</form>

<a href="../index.php" class="btn btn-neutral mt-4">Volver</a>

</body>
</html>
