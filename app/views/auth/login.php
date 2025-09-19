<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Master Jardist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">

        <?php $errors = $errors ?? []; ?>

        <!-- Logo -->
        <div class="flex justify-center">
            <img src="<?= asset('img/logo-pln.jpg') ?>"
                alt="Logo PLN" class="h-16 w-auto">
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mt-4">LOGIN MASTER JARDIST</h1>
        <p class="mt-1 text-center text-gray-500 text-sm mb-4">Gunakan Email PLN dan Password</p>

        <!-- Error Global -->
        <?php if (!empty($errors['login'])): ?>
            <div class="mb-2 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
                <?= implode('<br>', $errors['login']) ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" action="/login" class="mt-6 space-y-5">
            <!-- Email -->
            <div>
                <label for="email_pln" class="block text-sm font-medium text-gray-700">Email PLN</label>
                <input type="email" id="email_pln" name="email_pln" required
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 
                 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-400 
                 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
            </div>

            <!-- Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Login
                </button>
            </div>

            <!-- Sign Up Link -->
            <div class="text-center">
                <p class="text-sm text-gray-500 mt-4">Belum punya akun?
                    <a href="/signup" class="text-blue-600 font-medium hover:underline">Sign Up</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>