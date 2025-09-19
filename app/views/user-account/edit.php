<?php startBlock('content') ?>
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Edit User Account</h3>

    <!-- Form -->
    <form method="POST" action="/user-account/<?= $user['user_id'] ?>" class="space-y-5">
        <input type="hidden" name="_method" value="PUT">

        <!-- NIP -->
        <div>
            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
            <input type="text" id="nip" name="nip"
                value="<?= htmlspecialchars($old['nip'] ?? $user['nip'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['nip']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 
                       focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['nip'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['nip'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Nama Lengkap -->
        <div>
            <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name"
                value="<?= htmlspecialchars($old['full_name'] ?? $user['full_name'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['full_name']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 
                       focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['full_name'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['full_name'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Email PLN -->
        <div>
            <label for="email_pln" class="block text-sm font-medium text-gray-700">Email PLN</label>
            <input type="email" id="email_pln" name="email_pln"
                value="<?= htmlspecialchars($old['email_pln'] ?? $user['email_pln'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['email_pln']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 
                       focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['email_pln'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['email_pln'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Area -->
        <div>
            <label for="area" class="block text-sm font-medium text-gray-700">Area</label>
            <input type="text" id="area" name="area"
                value="<?= htmlspecialchars($old['area'] ?? $user['area'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['area']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 
                       focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['area'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['area'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Level User -->
        <div>
            <label for="level_user" class="block text-sm font-medium text-gray-700">Level User</label>
            <select id="level_user" name="level_user"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['level_user']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 
                       focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="Admin" <?= ($old['level_user'] ?? $user['level_user']) == 'Admin' ? 'selected' : '' ?>>Admin</option>
                <option value="Supervisor" <?= ($old['level_user'] ?? $user['level_user']) == 'Supervisor' ? 'selected' : '' ?>>Supervisor</option>
                <option value="Staff" <?= ($old['level_user'] ?? $user['level_user']) == 'Staff' ? 'selected' : '' ?>>Staff</option>
            </select>
            <?php if (!empty($errors['level_user'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['level_user'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Status Approval -->
        <div>
            <label for="is_approved" class="block text-sm font-medium text-gray-700">Status Approval</label>
            <select id="is_approved" name="is_approved"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['is_approved']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 
                       focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="TRUE" <?= ($old['is_approved'] ?? $user['is_approved']) == 'TRUE' ? 'selected' : '' ?>>Approved</option>
                <option value="FALSE" <?= ($old['is_approved'] ?? $user['is_approved']) == 'FALSE' ? 'selected' : '' ?>>Not Approved</option>
            </select>
            <?php if (!empty($errors['is_approved'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['is_approved'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between pt-4">
            <button type="button" onclick="window.history.back()"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                Back
            </button>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Update
            </button>
        </div>
    </form>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>