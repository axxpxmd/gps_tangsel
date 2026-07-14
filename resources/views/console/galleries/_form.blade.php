<div class="bg-white rounded-2xl border border-gray-200">
    <div class="px-6 sm:px-8 py-4 border-b border-gray-100 flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
        </div>
        <div><h3 class="text-sm font-bold text-gray-900">Informasi Galeri</h3><p class="text-[11px] text-gray-400">Lengkapi data album galeri GPS TangSel</p></div>
    </div>

    <div class="p-6 sm:p-8 space-y-6">
        {{-- Title --}}
        <div>
            <label for="title" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6z"/></svg>
                Judul Galeri <span class="text-red-400">*</span>
            </label>
            <input type="text" id="title" name="title" value="{{ old('title', $gallery->title ?? '') }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                placeholder="Contoh: Safari Subuh Masjid Al-Hidayah">
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                Deskripsi
            </label>
            <textarea id="description" name="description" rows="3"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none"
                placeholder="Deskripsi singkat album galeri...">{{ old('description', $gallery->description ?? '') }}</textarea>
        </div>

        {{-- Album & Date --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="album" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                    Album <span class="text-red-400">*</span>
                </label>
                <select id="album" name="album" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all">
                    <option value="">Pilih Album</option>
                    <option value="Safari Subuh" {{ old('album', $gallery->album ?? '') === 'Safari Subuh' ? 'selected' : '' }}>Safari Subuh</option>
                    <option value="Pasar Bahagia" {{ old('album', $gallery->album ?? '') === 'Pasar Bahagia' ? 'selected' : '' }}>Pasar Bahagia</option>
                    <option value="Puskesmas Cerdas Ceria" {{ old('album', $gallery->album ?? '') === 'Puskesmas Cerdas Ceria' ? 'selected' : '' }}>Puskesmas Cerdas Ceria</option>
                    <option value="Thibbun Nabawi" {{ old('album', $gallery->album ?? '') === 'Thibbun Nabawi' ? 'selected' : '' }}>Thibbun Nabawi</option>
                    <option value="GANTENG" {{ old('album', $gallery->album ?? '') === 'GANTENG' ? 'selected' : '' }}>GANTENG</option>
                    <option value="Umum" {{ old('album', $gallery->album ?? '') === 'Umum' ? 'selected' : '' }}>Umum</option>
                </select>
            </div>
            <div>
                <label for="date" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Tanggal
                </label>
                <input type="date" id="date" name="date" value="{{ old('date', isset($gallery) && $gallery->date ? $gallery->date->format('Y-m-d') : '') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all">
            </div>
        </div>

        {{-- Upload Gambar --}}
        <div>
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                Upload Gambar
            </label>
            <input type="file" id="gambar" name="gambar[]" multiple accept="image/jpeg,image/png,image/webp"
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:transition-colors file:cursor-pointer">
            <p class="text-[11px] text-gray-400 mt-2.5">Bisa pilih banyak gambar sekaligus. Format JPG, PNG, WebP. Maks 2MB per file.</p>
            <div id="preview-container" class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 mt-4"></div>
        </div>

        {{-- Status --}}
        <div class="pt-2">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }} class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                <span class="ml-3.5 text-sm font-medium text-gray-700">Tampilkan di halaman depan</span>
            </label>
        </div>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function () {
        var container = document.getElementById('preview-container');
        container.innerHTML = '';
        Array.from(this.files).forEach(function (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var div = document.createElement('div');
                div.className = 'relative rounded-xl overflow-hidden bg-gray-100 aspect-square';
                div.innerHTML = '<img src="' + e.target.result + '" class="w-full h-full object-cover">';
                container.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });

    document.querySelector('input[name="is_active"]').addEventListener('change', function () {
        var label = this.parentElement.querySelector('span:last-child');
        label.textContent = this.checked ? 'Tampilkan di halaman depan' : 'Disembunyikan dari halaman depan';
    });
</script>
