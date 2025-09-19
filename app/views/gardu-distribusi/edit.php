<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Gardu Distribusi</h3>

    <form method="POST" action="/gardu-distribusi/<?= $id ?>" class="space-y-5">
        <input type="hidden" name="_method" value="PUT">

        <!-- Kode Gardu -->
        <div>
            <label for="kode_gardu" class="block text-sm font-medium text-gray-700">Kode Gardu</label>
            <input type="text" id="kode_gardu" name="kode_gardu"
                value="<?= htmlspecialchars($old['kode_gardu'] ?? ($gardu['kode_gardu'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['kode_gardu']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['kode_gardu'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['kode_gardu'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Nama Gardu -->
        <div>
            <label for="nama_gardu" class="block text-sm font-medium text-gray-700">Nama Gardu</label>
            <input type="text" id="nama_gardu" name="nama_gardu"
                value="<?= htmlspecialchars($old['nama_gardu'] ?? ($gardu['nama_gardu'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['nama_gardu']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['nama_gardu'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['nama_gardu'][0], ENT_QUOTES, 'UTF-8') ?>
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
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['alamat'] ?? ($gardu['alamat'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>

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
                value="<?= htmlspecialchars((string)($old['lat'] ?? ($gardu['lat'] ?? '')), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['lat']) ? 'border-red-500' : 'border-gray-400' ?> bg-gray-100 text-gray-900 
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
                value="<?= htmlspecialchars((string)($old['lon'] ?? ($gardu['lon'] ?? '')), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['lon']) ? 'border-red-500' : 'border-gray-400' ?> bg-gray-100 text-gray-900 
                    shadow-sm focus:border-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['lon'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['lon'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Keterangan -->
        <div>
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['keterangan']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['keterangan'] ?? ($gardu['keterangan'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>

            <?php if (!empty($errors['keterangan'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['keterangan'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Gardu Induk -->
        <div>
            <label for="gi_id" class="block text-sm font-medium text-gray-700">Gardu Induk</label>
            <select id="gi_id" name="gi_id"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['gi_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm px-3 py-2 text-sm">
                <option value="">--Pilih GI--</option>
                <?php foreach ($garduInduks as $gi): ?>
                    <?php $selected = $old['gi_id'] ?? ($gardu['gi_id'] ?? null); ?>
                    <option value="<?= $gi['gi_id'] ?>" <?= $gi['gi_id'] == $selected ? 'selected' : '' ?>>
                        <?= htmlspecialchars($gi['nama_gi'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php if (!empty($errors['gi_id'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['gi_id'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Penyulang -->
        <div>
            <label for="penyulang_id" class="block text-sm font-medium text-gray-700">Penyulang</label>
            <select id="penyulang_id" name="penyulang_id"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['penyulang_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm px-3 py-2 text-sm">
                <option value="">--Pilih Penyulang--</option>
                <?php foreach ($penyulangs as $penyulang): ?>
                    <?php $selected = $old['penyulang_id'] ?? ($gardu['penyulang_id'] ?? null); ?>
                    <option value="<?= $penyulang['penyulang_id'] ?>" <?= $penyulang['penyulang_id'] == $selected ? 'selected' : '' ?>>
                        <?= htmlspecialchars($penyulang['nama_penyulang'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php if (!empty($errors['penyulang_id'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['penyulang_id'][0], ENT_QUOTES, 'UTF-8') ?>
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
                Update
            </button>
        </div>
    </form>
</div>

<!-- Leaflet JS & CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView([-6.2, 106.8], 11); // Default Jakarta

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker;

    // Set marker awal jika ada data
    const initialLat = <?= json_encode($old['lat'] ?? ($gardu['lat'] ?? null)) ?>;
    const initialLon = <?= json_encode($old['lon'] ?? ($gardu['lon'] ?? null)) ?>;
    if (initialLat && initialLon) {
        marker = L.marker([initialLat, initialLon]).addTo(map);
        map.setView([initialLat, initialLon], 15);
    }

    map.on('click', function(e) {
        const {
            lat,
            lng
        } = e.latlng;

        document.getElementById('lat').value = lat.toFixed(6);
        document.getElementById('lon').value = lng.toFixed(6);

        if (marker) map.removeLayer(marker);
        marker = L.marker([lat, lng]).addTo(map);
    });
</script>
<?php endBlock() ?>

<?php extend('layouts/app') ?>