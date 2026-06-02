<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Connexion - Gestion Group Commandes</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="font-sans">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo / Brand -->
            <div class="text-center">
                <div class="mx-auto h-12 w-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-white">
                    Gestion Commandes
                </h2>
                <p class="mt-2 text-sm text-indigo-200">
                    Espace d'administration
                </p>
            </div>

            <!-- Contenu principal -->
            <?= $content ?>
        </div>
    </div>

</body>
</html>