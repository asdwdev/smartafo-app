<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Gardu Induk</h3>

    <!-- Form -->
    <form method="POST" action="/gardu-induk" class="space-y-5">

        <!-- Kode GI -->
        <div>
            <label for="kode_gi" class="block text-sm font-medium text-gray-700">Kode GI</label>
            <input type="text" id="kode_gi" name="kode_gi"
                value="<?= htmlspecialchars($old['kode_gi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['kode_gi']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-white text-gray-900 shadow-sm 
                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['kode_gi'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['kode_gi'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>


        <!-- Nama GI -->
        <div>
            <label for="nama_gi" class="block text-sm font-medium text-gray-700">Nama GI</label>
            <input type="text" id="nama_gi" name="nama_gi"
                value="<?= htmlspecialchars($old['nama_gi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['nama_gi']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-white text-gray-900 shadow-sm 
                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['nama_gi'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['nama_gi'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Area -->
        <div>
            <label for="area" class="block text-sm font-medium text-gray-700">Area</label>
            <input type="text" id="area" name="area"
                value="<?= htmlspecialchars($old['area'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['area']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-white text-gray-900 shadow-sm 
                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['area'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['area'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['area']) ? 'border-red-500' : 'border-gray-400' ?>  bg-white text-gray-900 
                             shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['alamat'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>

            <?php if (!empty($errors['area'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['area'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Map untuk ambil koordinat -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Pilih Lokasi (klik di peta)</label>
            <div id="map" class="mt-2 h-72 w-full rounded-lg border border-gray-300 shadow"></div>
        </div>

        <!-- Latitude -->
        <div>
            <label for="lat" class="block text-sm font-medium text-gray-700">Latitude</label>
            <input type="text" id="lat" name="lat" readonly
                value="<?= htmlspecialchars((string)($old['lat'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['area']) ? 'border-red-500' : 'border-gray-400' ?> bg-gray-100 text-gray-900 
                          shadow-sm focus:border-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['lat'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['lat'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Longitude -->
        <div>
            <label for="lon" class="block text-sm font-medium text-gray-700">Longitude</label>
            <input type="text" id="lon" name="lon" readonly
                value="<?= htmlspecialchars((string)($old['lon'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['area']) ? 'border-red-500' : 'border-gray-400' ?> bg-gray-100 text-gray-900 
                          shadow-sm focus:border-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['lon'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['lat'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
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
                Submit
            </button>
        </div>
    </form>
</div>

<!-- Leaflet JS & CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView([-6.2, 106.8], 11); // Default Jakarta

    // Tambah tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker;

    // Klik peta -> ambil koordinat
    map.on('click', function(e) {
        const {
            lat,
            lng
        } = e.latlng;

        // isi input
        document.getElementById('lat').value = lat.toFixed(6);
        document.getElementById('lon').value = lng.toFixed(6);

        // hapus marker lama
        if (marker) {
            map.removeLayer(marker);
        }

        // tambah marker baru
        marker = L.marker([lat, lng]).addTo(map);
    });
</script>
<?php endBlock() ?>

<?php extend('layouts/app') ?>