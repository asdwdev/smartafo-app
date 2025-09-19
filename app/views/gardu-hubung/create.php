<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Gardu Hubung</h3>

    <!-- Form -->
    <form method="POST" action="/gardu-hubung" class="space-y-5">

        <!-- Kode GH -->
        <div>
            <label for="kode_gh" class="block text-sm font-medium text-gray-700">Kode GH</label>
            <input type="text" id="kode_gh" name="kode_gh"
                value="<?= htmlspecialchars($old['kode_gh'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['kode_gh']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-white text-gray-900 shadow-sm 
                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['kode_gh'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['kode_gh'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Nama GH -->
        <div>
            <label for="nama_gh" class="block text-sm font-medium text-gray-700">Nama GH</label>
            <input type="text" id="nama_gh" name="nama_gh"
                value="<?= htmlspecialchars($old['nama_gh'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['nama_gh']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-white text-gray-900 shadow-sm 
                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['nama_gh'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['nama_gh'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['alamat']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-white text-gray-900 shadow-sm 
                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['alamat'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>

            <?php if (!empty($errors['alamat'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['alamat'][0], ENT_QUOTES, 'UTF-8') ?>
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
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['lat']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-gray-100 text-gray-900 shadow-sm 
                  focus:border-blue-500 text-sm px-3 py-2">

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
                class="mt-1 block w-full rounded-lg border 
                  <?= !empty($errors['lon']) ? 'border-red-500' : 'border-gray-400' ?> 
                  bg-gray-100 text-gray-900 shadow-sm 
                  focus:border-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['lon'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['lon'][0], ENT_QUOTES, 'UTF-8') ?>
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
    const map = L.map('map').setView([-6.2, 106.8], 11); // Default view

    // Tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker;

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