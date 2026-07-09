<div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
    <div class="p-6 sm:p-8 space-y-5">
        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Nama Program <span class="text-red-400">*</span>
            </label>
            <input type="text" id="title" name="title" value="{{ old('title', $program->title ?? '') }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                placeholder="Contoh: S4 (Semangat Safari Sholat Subuh)">
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Deskripsi <span class="text-red-400">*</span>
            </label>
            <textarea id="description" name="description" rows="4" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none"
                placeholder="Deskripsi lengkap program...">{{ old('description', $program->description ?? '') }}</textarea>
        </div>

        {{-- Penerima Manfaat --}}
        <div>
            <label for="penerima_manfaat" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Penerima Manfaat <span class="text-red-400">*</span>
            </label>
            <textarea id="penerima_manfaat" name="penerima_manfaat" rows="3" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none"
                placeholder="Siapa penerima manfaat program ini?">{{ old('penerima_manfaat', $program->penerima_manfaat ?? '') }}</textarea>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Thumbnail</label>
            <div class="flex items-start gap-4">
                <div class="w-24 h-24 rounded-xl bg-gray-50 border border-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0">
                    @if (isset($program) && $program->thumbnail_url)
                        <img src="{{ $program->thumbnail_url }}" alt="Preview" class="w-full h-full object-cover">
                    @else
                        <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                        </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:transition-colors file:cursor-pointer">
                    <p class="text-[11px] text-gray-400 mt-2">JPG, PNG, atau WebP. Maksimal 2MB.</p>
                    @if (isset($program) && $program->thumbnail)
                        <p class="text-[11px] text-gray-400 mt-0.5">File saat ini: {{ $program->thumbnail }}</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sort Order & Status --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-1.5">
                    Urutan
                </label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $program->sort_order ?? 0) }}" min="0"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                    placeholder="0">
                <p class="text-[11px] text-gray-400 mt-1.5">Angka lebih kecil tampil lebih dulu.</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}
                        class="sr-only peer">
                    <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
                    <span class="ml-3 text-sm font-medium text-gray-600 peer-checked:text-emerald-600" id="status-label">
                        {{ old('is_active', $program->is_active ?? true) ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('input[name="is_active"]').addEventListener('change', function () {
        document.getElementById('status-label').textContent = this.checked ? 'Aktif' : 'Nonaktif';
        if (this.checked) {
            document.getElementById('status-label').classList.add('text-emerald-600');
            document.getElementById('status-label').classList.remove('text-gray-400');
        } else {
            document.getElementById('status-label').classList.add('text-gray-400');
            document.getElementById('status-label').classList.remove('text-emerald-600');
        }
    });
</script>
