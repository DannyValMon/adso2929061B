<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Pokémon</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-base-200">

<div class="card bg-base-100 shadow-xl w-full max-w-md p-6">

    <h2 class="text-2xl mb-5 font-bold text-center">Adicionar Pokémon</h2>

    <form method="POST" action="<?= $data['url'] ?>store" class="space-y-4">

        <input
            required
            name="name"
            placeholder="Nombre"
            class="input input-bordered w-full"
            autofocus
        >

        <select name="type" class="select select-bordered w-full" required>
            <option disabled selected>Seleccione tipo</option>
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

        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Strength</span>
                <span id="strV">128</span>
            </div>
            <input type="range" min="0" max="255" value="128"
                   name="strength" class="range"
                   oninput="strV.textContent=this.value">
        </div>

        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Stamina</span>
                <span id="staV">128</span>
            </div>
            <input type="range" min="0" max="255" value="128"
                   name="stamina" class="range"
                   oninput="staV.textContent=this.value">
        </div>

        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Speed</span>
                <span id="spdV">128</span>
            </div>
            <input type="range" min="0" max="255" value="128"
                   name="speed" class="range"
                   oninput="spdV.textContent=this.value">
        </div>

        <div>
            <div class="flex justify-between text-sm font-medium mb-1">
                <span>Accuracy</span>
                <span id="accV">128</span>
            </div>
            <input type="range" min="0" max="255" value="128"
                   name="accuracy" class="range"
                   oninput="accV.textContent=this.value">
        </div>

        <select name="trainer_id" class="select select-bordered w-full">
            <option value="">Sin entrenador</option>
            <?php foreach ($data['trainers'] as $trainer): ?>
                <option value="<?= $trainer['id'] ?>">
                    <?= htmlspecialchars($trainer['name']) ?> (Lvl <?= $trainer['level'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-success w-full">
            Guardar
        </button>

    </form>

    <a href="<?= $data['url'] ?>" class="btn btn-neutral w-full mt-4">
        Volver
    </a>

</div>

</body>
</html>
