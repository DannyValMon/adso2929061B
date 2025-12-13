<?php
require_once "../application/model.php";
$model = new Model;

$id = $_GET["id"] ?? null;
if (!$id) die("ID inválido");

$pokemon = $model->getPokemon($id);
$trainers = $model->listTrainers();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $type = $_POST["type"];
    $strength = $_POST["strength"];
    $stamina = $_POST["stamina"];
    $speed = $_POST["speed"];
    $accuracy = $_POST["accuracy"];
    $trainer_id = $_POST["trainer_id"];

    if ($model->updatePokemon($id, $name, $type, $strength, $stamina, $speed, $accuracy, $trainer_id)) {
        header("Location: ../index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Pokémon</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-base-200">

<div class="card bg-base-100 shadow-xl w-full max-w-md p-6">

    <h2 class="text-2xl font-bold mb-6 text-center">Editar Pokémon</h2>

    <form method="POST" class="space-y-5">


        <input
            required
            name="name"
            value="<?= htmlspecialchars($pokemon['name']) ?>"
            class="input input-bordered w-full"
            placeholder="Nombre del Pokémon"
        >

        <select name="type" class="select select-bordered w-full" required>
            <?php
            $types = ["Water","Fire","Grass","Electric","Normal","Ghost","Poison","Dragon","Rock"];
            foreach ($types as $t):
            ?>
                <option value="<?= $t ?>" <?= $pokemon['type'] == $t ? "selected" : "" ?>>
                    <?= $t ?>
                </option>
            <?php endforeach; ?>
        </select>


        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Strength</span>
                <span id="strE"><?= $pokemon['strength'] ?></span>
            </div>
            <input
                type="range"
                min="0"
                max="255"
                value="<?= $pokemon['strength'] ?>"
                name="strength"
                class="range range-success"
                oninput="strE.textContent=this.value"
            >
        </div>

        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Stamina</span>
                <span id="staE"><?= $pokemon['stamina'] ?></span>
            </div>
            <input
                type="range"
                min="0"
                max="255"
                value="<?= $pokemon['stamina'] ?>"
                name="stamina"
                class="range range-success"
                oninput="staE.textContent=this.value"
            >
        </div>


        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Speed</span>
                <span id="spdE"><?= $pokemon['speed'] ?></span>
            </div>
            <input
                type="range"
                min="0"
                max="255"
                value="<?= $pokemon['speed'] ?>"
                name="speed"
                class="range range-success"
                oninput="spdE.textContent=this.value"
            >
        </div>

        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Accuracy</span>
                <span id="accE"><?= $pokemon['accuracy'] ?></span>
            </div>
            <input
                type="range"
                min="0"
                max="255"
                value="<?= $pokemon['accuracy'] ?>"
                name="accuracy"
                class="range range-success"
                oninput="accE.textContent=this.value"
            >
        </div>


        <select name="trainer_id" class="select select-bordered w-full">
            <?php foreach ($trainers as $t): ?>
                <option
                    value="<?= $t['id'] ?>"
                    <?= $pokemon['trainer_id'] == $t['id'] ? "selected" : "" ?>
                >
                    <?= htmlspecialchars($t['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-success w-full mt-4">
            Actualizar
        </button>

    </form>

    <a href="../index.php" class="btn btn-neutral w-full mt-3">
        Volver
    </a>

</div>

</body>
</html>
