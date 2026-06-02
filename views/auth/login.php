<div class="bg-white py-8 px-4 shadow-xl rounded-lg sm:px-10">
    
    <?php if(isset($error)): ?>
        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-600"><?= htmlspecialchars($error) ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($success)): ?>
        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-600"><?= htmlspecialchars($success) ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= path('auth', 'register') ?>" class="space-y-6">
        
        <!-- Inputs cachés -->
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token ?? '') ?>">
        <input type="hidden" name="timestamp" value="<?= time() ?>">
        <input type="hidden" name="action_form" value="register">

        <!-- Nom -->
        <div>
            <label for="nom" class="block text-sm font-medium text-gray-700">
                Nom complet
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <input
                    type="text"
                    name="nom"
                    id="nom"
                    required
                    value="<?= htmlspecialchars($nom ?? '') ?>"
                    placeholder="Dupont"
                    class="block w-full pl-10 pr-3 py-2 border <?= isset($errors['nom']) ? 'border-red-300' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>
            <?php if(isset($errors['nom'])): ?>
                <p class="mt-1 text-xs text-red-600"><?= $errors['nom'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Prénom -->
        <div>
            <label for="prenom" class="block text-sm font-medium text-gray-700">
                Prénom
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <input
                    type="text"
                    name="prenom"
                    id="prenom"
                    required
                    value="<?= htmlspecialchars($prenom ?? '') ?>"
                    placeholder="Jean"
                    class="block w-full pl-10 pr-3 py-2 border <?= isset($errors['prenom']) ? 'border-red-300' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>
            <?php if(isset($errors['prenom'])): ?>
                <p class="mt-1 text-xs text-red-600"><?= $errors['prenom'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Adresse email
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    value="<?= htmlspecialchars($email ?? '') ?>"
                    placeholder="jean.dupont@email.com"
                    class="block w-full pl-10 pr-3 py-2 border <?= isset($errors['email']) ? 'border-red-300' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>
            <?php if(isset($errors['email'])): ?>
                <p class="mt-1 text-xs text-red-600"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Mot de passe -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Mot de passe
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    placeholder="••••••••"
                    class="block w-full pl-10 pr-3 py-2 border <?= isset($errors['password']) ? 'border-red-300' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>
            <?php if(isset($errors['password'])): ?>
                <p class="mt-1 text-xs text-red-600"><?= $errors['password'] ?></p>
            <?php endif; ?>
            <p class="mt-1 text-xs text-gray-500">Le mot de passe doit contenir au moins 6 caractères</p>
        </div>

        <!-- Confirmation mot de passe -->
        <div>
            <label for="confirm_password" class="block text-sm font-medium text-gray-700">
                Confirmer le mot de passe
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    required
                    placeholder="••••••••"
                    class="block w-full pl-10 pr-3 py-2 border <?= isset($errors['confirm_password']) ? 'border-red-300' : 'border-gray-300' ?> rounded-md text-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>
            <?php if(isset($errors['confirm_password'])): ?>
                <p class="mt-1 text-xs text-red-600"><?= $errors['confirm_password'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Checkbox conditions -->
        <div class="flex items-center">
            <input
                type="checkbox"
                name="conditions"
                id="conditions"
                required
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
            >
            <label for="conditions" class="ml-2 block text-sm text-gray-700">
                J'accepte les <a href="#" class="text-indigo-600 hover:text-indigo-500">conditions d'utilisation</a>
            </label>
        </div>

        <!-- Bouton d'inscription -->
        <div>
            <button
                type="submit"
                class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition cursor-pointer"
            >
                S'inscrire 
            </button>
        </div>

        <!-- Lien connexion -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Déjà inscrit ?
                <a href="<?= path('auth', 'loginForm') ?>" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Connectez-vous ici
                </a>
            </p>
        </div>

    </form>
</div>