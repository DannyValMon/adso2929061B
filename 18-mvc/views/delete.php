<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Pokémon</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content text-center">
        <div class="max-w-sm w-full">

            <h1 class="text-4xl font-bold text-error">Eliminar Pokémon</h1>
            <p class="mb-6 text-sm opacity-70">
            </p>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body space-y-4">

                 
                    <div class="text-left space-y-2">
                        <p class="text-sm">
                            <span class="font-semibold">ID:</span>
                            <?= htmlspecialchars($data['pokemon']['id']) ?>
                        </p>

                        <p class="text-lg font-bold">
                            <?= htmlspecialchars($data['pokemon']['name']) ?>
                        </p>

                        <?php
                        $colors = [
                            'Water' => 'badge-info',
                            'Grass' => 'badge-success',
                            'Fire' => 'badge-error',
                            'Electric' => 'badge-warning',
                            'Normal' => 'badge-secondary',
                            'Poison' => 'badge-primary',
                            'Ghost' => 'badge-accent',
                            'Dragon' => 'badge-secondary',
                            'Rock' => 'badge-neutral'
                        ];
                        $badge = $colors[$data['pokemon']['type']] ?? 'badge-ghost';
                        ?>

                        <span class="badge <?= $badge ?>">
                            <?= htmlspecialchars($data['pokemon']['type']) ?>
                        </span>
                    </div>

                    <div class="divider"></div>

                
                    <form id="deleteForm"
                          method="POST"
                          action="<?= $data['url'] ?>destroy/<?= $data['pokemon']['id'] ?>">

                        <div class="flex flex-col gap-2">

                            <button type="button"
                                    onclick="confirmDelete()"
                                    class="btn btn-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16Z"/>
                                </svg>
                                Eliminar
                            </button>

                            <a href="<?= $data['url'] ?>"
                               class="btn btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"/>
                                </svg>
                                Cancelar
                            </a>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
function confirmDelete() {
    Swal.fire({
        title: '¿Eliminar Pokémon?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm').submit();
        }
    });
}
</script>

</body>
</html>
