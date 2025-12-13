<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pokémon</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="mvc">

<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content text-center">
        <div class="max-w-md w-full">

            <!-- HEADER -->
            <h1 class="text-5xl font-bold">MVC</h1>
            <h3 class="mb-6">Editar Pokémon</h3>
            <p class="mb-8 opacity-70">
                Ajusta los atributos de
                <span class="font-semibold">
                    <?= htmlspecialchars($data['pokemon']['name']) ?>
                </span>
            </p>

            <!-- CARD -->
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <form
                    method="POST"
                    action="<?= $data['url'] ?>update/<?= htmlspecialchars($data['pokemon']['id']) ?>"
                    class="card-body space-y-4"
                >

                    <!-- ID (SOLO VISUAL) -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">ID</span>
                        </label>
                        <input
                            type="text"
                            value="<?= htmlspecialchars($data['pokemon']['id']) ?>"
                            class="input input-bordered bg-base-200"
                            disabled
                        >
                    </div>

                    <!-- NAME -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nombre</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="<?= htmlspecialchars($data['pokemon']['name']) ?>"
                            class="input input-bordered"
                            required
                        >
                    </div>

                    <!-- TYPE -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Tipo</span>
                        </label>
                        <select name="type" class="select select-bordered" required>
                            <?php
                            $types = ['Water','Grass','Fire','Electric','Normal','Poison','Ghost','Dragon','Rock','Fighting','Psychic','Ice'];
                            foreach ($types as $type):
                            ?>
                                <option value="<?= $type ?>"
                                    <?= $data['pokemon']['type'] === $type ? 'selected' : '' ?>>
                                    <?= $type ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- TRAINER -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Entrenador</span>
                        </label>
                        <select name="trainer_id" class="select select-bordered">
                            <option value="">Sin entrenador</option>
                            <?php foreach ($data['trainers'] as $trainer): ?>
                                <option
                                    value="<?= $trainer['id'] ?>"
                                    <?= $data['pokemon']['trainer_id'] == $trainer['id'] ? 'selected' : '' ?>
                                >
                                    <?= htmlspecialchars($trainer['name']) ?> (Lvl <?= $trainer['level'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="divider text-sm opacity-60">ESTADÍSTICAS</div>

                    <!-- STATS -->
                    <div class="form-control">
                        <label class="label flex justify-between">
                            <span>Strength</span>
                            <span class="badge badge-error" id="strVal">
                                <?= $data['pokemon']['strength'] ?>
                            </span>
                        </label>
                        <input
                            type="range"
                            min="1" max="1500"
                            name="strength"
                            value="<?= $data['pokemon']['strength'] ?>"
                            class="range range-error"
                            oninput="strVal.textContent=this.value"
                        >
                    </div>

                    <div class="form-control">
                        <label class="label flex justify-between">
                            <span>Stamina</span>
                            <span class="badge badge-success" id="staVal">
                                <?= $data['pokemon']['stamina'] ?>
                            </span>
                        </label>
                        <input
                            type="range"
                            min="1" max="500"
                            name="stamina"
                            value="<?= $data['pokemon']['stamina'] ?>"
                            class="range range-success"
                            oninput="staVal.textContent=this.value"
                        >
                    </div>

                    <div class="form-control">
                        <label class="label flex justify-between">
                            <span>Speed</span>
                            <span class="badge badge-warning" id="spdVal">
                                <?= $data['pokemon']['speed'] ?>
                            </span>
                        </label>
                        <input
                            type="range"
                            min="1" max="200"
                            name="speed"
                            value="<?= $data['pokemon']['speed'] ?>"
                            class="range range-warning"
                            oninput="spdVal.textContent=this.value"
                        >
                    </div>

                    <div class="form-control">
                        <label class="label flex justify-between">
                            <span>Accuracy</span>
                            <span class="badge badge-info" id="accVal">
                                <?= $data['pokemon']['accuracy'] ?>
                            </span>
                        </label>
                        <input
                            type="range"
                            min="1" max="250"
                            name="accuracy"
                            value="<?= $data['pokemon']['accuracy'] ?>"
                            class="range range-info"
                            oninput="accVal.textContent=this.value"
                        >
                    </div>

                    <!-- ACTIONS -->
                    <div class="pt-4 flex gap-2">
                        <button type="submit" class="btn btn-success flex-1">
                            Guardar
                        </button>
                        <a href="<?= $data['url'] ?>" class="btn btn-ghost flex-1">
                            Volver
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
