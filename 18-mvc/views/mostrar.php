<?php
require_once "../application/model.php";
$model = new Model;

$id = $_GET["id"] ?? null;
if (!$id) {
    die("ID no recibido");
}

$pokemon = $model->getPokemonWithTrainer($id);

if (!$pokemon) {
    die("Pokémon no encontrado");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Detalles del Pokémon</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="p-10">

<div class="max-w-md mx-auto card bg-base-200 shadow-xl p-6">

    <h1 class="text-3xl font-bold mb-4">Detalles del Pokémon</h1>

    <p><strong>ID:</strong> <?= $pokemon['id'] ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($pokemon['name']) ?></p>
    <p><strong>Type:</strong> <?= htmlspecialchars($pokemon['type']) ?></p>

    <hr class="my-4">

    <p><strong>Strength:</strong> <?= $pokemon['strength'] ?></p>
    <p><strong>Stamina:</strong> <?= $pokemon['stamina'] ?></p>
    <p><strong>Speed:</strong> <?= $pokemon['speed'] ?></p>
    <p><strong>Accuracy:</strong> <?= $pokemon['accuracy'] ?></p>
    <p><strong>Trainer:</strong> <?= htmlspecialchars($pokemon['trainer_name'] ?? 'Sin entrenador') ?></p>

    <a href="../index.php" class="btn btn-success mt-5 w-full">
        Volver
    </a>

</div>

</body>
</html>
