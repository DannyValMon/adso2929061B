<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Pokémon</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="p-10 bg-base-200">

<div class="max-w-md mx-auto card bg-base-200 shadow-xl p-6">

    <h1 class="text-3xl font-bold mb-4">Detalles del Pokémon</h1>

    <p><strong>ID:</strong> <?= htmlspecialchars($data['pokemon']['id']) ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($data['pokemon']['name']) ?></p>
    <p><strong>Type:</strong> <?= htmlspecialchars($data['pokemon']['type']) ?></p>

    <hr class="my-4">

    <p><strong>Strength:</strong> <?= htmlspecialchars($data['pokemon']['strength']) ?></p>
    <p><strong>Stamina:</strong> <?= htmlspecialchars($data['pokemon']['stamina']) ?></p>
    <p><strong>Speed:</strong> <?= htmlspecialchars($data['pokemon']['speed']) ?></p>
    <p><strong>Accuracy:</strong> <?= htmlspecialchars($data['pokemon']['accuracy']) ?></p>

    <p>
        <strong>Trainer:</strong>
        <?= htmlspecialchars($data['pokemon']['trainer_name'] ?? 'Sin entrenador') ?>
    </p>

    <a href="<?= $data['url'] ?>" class="btn btn-success mt-5 w-full">
        Volver
    </a>

</div>

</body>
</html>
