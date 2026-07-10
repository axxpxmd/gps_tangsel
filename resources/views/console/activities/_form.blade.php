<div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
    <div class="px-6 sm:px-8 py-4 border-b border-gray-100 flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <div>
            <h3 class="text-sm font-bold text-gray-900">Informasi Kegiatan</h3>
            <p class="text-[11px] text-gray-400">Lengkapi data agenda kegiatan GPS TangSel</p>
        </div>
    </div>

    <div class="p-6 sm:p-8 space-y-6">
        {{-- Title --}}
        <div>
            <label for="title" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6z"/></svg>
                Judul Kegiatan <span class="text-red-400">*</span>
            </label>
            <input type="text" id="title" name="title" value="{{ old('title', $activity->title ?? '') }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                placeholder="Contoh: Safari Sholat Subuh (S4)">
        </div>

        {{-- Date & Time --}}
        <div>
            <label for="date" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Tanggal & Waktu <span class="text-red-400">*</span>
            </label>
            <input type="datetime-local" id="date" name="date"
                value="{{ old('date', isset($activity) ? $activity->date->format('Y-m-d\TH:i') : '') }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all">
            <p class="text-[11px] text-gray-400 mt-1">Pilih tanggal dan waktu kegiatan.</p>
        </div>

        {{-- Location --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="sm:col-span-3">
                <label for="location" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Lokasi <span class="text-red-400">*</span>
                </label>
                <input type="text" id="location" name="location" value="{{ old('location', $activity->location ?? '') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                    placeholder="Masjid Al-Hidayah, Ciputat">
            </div>
            <div>
                <label for="latitude" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">Latitude</label>
                <input type="text" id="latitude" name="latitude" value="{{ old('latitude', $activity->latitude ?? '') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all font-mono"
                    placeholder="-6.2088">
            </div>
            <div>
                <label for="longitude" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">Longitude</label>
                <input type="text" id="longitude" name="longitude" value="{{ old('longitude', $activity->longitude ?? '') }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all font-mono"
                    placeholder="106.7504">
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                Deskripsi <span class="text-red-400">*</span>
            </label>
            <textarea id="description" name="description" rows="4" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none"
                placeholder="Deskripsi lengkap kegiatan...">{{ old('description', $activity->description ?? '') }}</textarea>
        </div>

        {{-- Gambar --}}
        <div>
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                Poster
            </label>
            <div class="flex items-start gap-5">
                <div class="w-28 h-28 rounded-2xl bg-gray-50 border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0" id="gambar-preview">
                    @if (isset($activity) && $activity->gambar_url)
                        <img src="{{ $activity->gambar_url }}" alt="Preview" class="w-full h-full object-cover" id="preview-img">
                    @else
                        <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" id="preview-placeholder"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                    @endif
                </div>
                <div class="flex-1">
                    <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:transition-colors file:cursor-pointer">
                    <p class="text-[11px] text-gray-400 mt-2.5">Format JPG, PNG, atau WebP. Maksimal 2MB.</p>
                    @if (isset($activity) && $activity->gambar)
                        <div class="flex items-center gap-1.5 mt-2"><svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span class="text-[11px] text-gray-400">File tersimpan: {{ $activity->gambar }}</span></div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Status --}}
        <div class="pt-2">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $activity->is_active ?? true) ? 'checked' : '' }} class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                <span class="ml-3.5 text-sm font-medium text-gray-700">Tampilkan kegiatan ini di kalender</span>
            </label>
        </div>
    </div>
</div>

<script>
    document.querySelector('input[name="is_active"]').addEventListener('change', function () {
        var label = this.parentElement.querySelector('span:last-child');
        label.textContent = this.checked ? 'Tampilkan kegiatan ini di kalender' : 'Kegiatan disembunyikan dari kalender';
    });

    document.getElementById('gambar').addEventListener('change', function () {
        var file = this.files[0];
        if (!file) return;
        var preview = document.getElementById('gambar-preview');
        var existingImg = document.getElementById('preview-img');
        var placeholder = document.getElementById('preview-placeholder');
        if (existingImg) existingImg.remove();
        if (placeholder) placeholder.remove();
        var img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.alt = 'Preview';
        img.className = 'w-full h-full object-cover';
        img.id = 'preview-img';
        preview.appendChild(img);
    });
</script>
