<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Master Jardist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">

        <!-- Logo -->
        <div class="flex justify-center">
            <img src="<?= asset('img/logo-pln.jpg') ?>" alt="Logo PLN" class="h-16 w-auto">
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mt-4">SIGNUP MASTER JARDIST</h1>
        <p class="mt-1 text-center text-gray-500 text-sm">Lengkapi data berikut untuk membuat akun</p>

        <!-- Form -->
        <form method="POST" action="/signup" class="mt-6 space-y-5">

            <!-- NIP -->
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="text" id="nip" name="nip"
                    value="<?= htmlspecialchars($_POST['nip'] ?? '') ?>"
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
                <?= error($errors ?? [], 'nip') ?>
            </div>

            <!-- Nama -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name"
                    value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>"
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
                <?= error($errors ?? [], 'full_name') ?>
            </div>

            <!-- Email -->
            <div>
                <label for="email_pln" class="block text-sm font-medium text-gray-700">Email PLN</label>
                <input type="email" id="email_pln" name="email_pln"
                    value="<?= htmlspecialchars($_POST['email_pln'] ?? '') ?>"
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
                <?= error($errors ?? [], 'email_pln') ?>
            </div>

            <!-- Area -->
            <div>
                <label for="area" class="block text-sm font-medium text-gray-700">Area</label>
                <input type="text" id="area" name="area"
                    value="<?= htmlspecialchars($_POST['area'] ?? '') ?>"
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
                <?= error($errors ?? [], 'area') ?>
            </div>

            <!-- Level User -->
            <div>
                <label for="level_user" class="block text-sm font-medium text-gray-700">Level User</label>
                <select id="level_user" name="level_user"
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
                    <option value="">-- Pilih Level --</option>
                    <option value="ADMIN AREA" <?= (($_POST['level_user'] ?? '') === 'ADMIN AREA') ? 'selected' : '' ?>>ADMIN AREA</option>
                </select>
                <?= error($errors ?? [], 'level_user') ?>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-3 py-2">
                <?= error($errors ?? [], 'password') ?>
            </div>

            <!-- Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Submit
                </button>
            </div>

            <!-- Back to Login -->
            <div class="text-center">
                <p class="text-sm text-gray-500 mt-4">Sudah punya akun?
                    <a href="/login" class="text-blue-600 font-medium hover:underline">Login</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>