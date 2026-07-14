<div class="bg-white rounded-2xl border border-gray-200">
    <div class="px-6 sm:px-8 py-4 border-b border-gray-100 flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021"/>
            </svg>
        </div>
        <div>
            <h3 class="text-sm font-bold text-gray-900">Informasi Partner</h3>
            <p class="text-[11px] text-gray-400">Lengkapi data mitra kolaborasi GPS TangSel</p>
        </div>
    </div>

    <div class="p-6 sm:p-8 space-y-6">
        {{-- Name --}}
        <div>
            <label for="name" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                </svg>
                Nama Partner <span class="text-red-400">*</span>
            </label>
            <input type="text" id="name" name="name" value="{{ old('name', $partner->name ?? '') }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                placeholder="Contoh: Dinkes Tangerang Selatan">
            <p class="text-[11px] text-gray-400 mt-1">Nama institusi atau organisasi partner.</p>
        </div>

        {{-- Logo --}}
        <div>
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                </svg>
                Logo
            </label>
            <div class="flex items-start gap-5">
                <div class="w-28 h-28 rounded-2xl bg-gray-50 border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0" id="gambar-preview">
                    @if (isset($partner) && $partner->gambar_url)
                        <img src="{{ $partner->gambar_url }}" alt="Preview" class="w-full h-full object-contain p-3" id="preview-img">
                    @else
                        <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" id="preview-placeholder">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                        </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:transition-colors file:cursor-pointer">
                    <p class="text-[11px] text-gray-400 mt-2.5">Format JPG, PNG, atau WebP. Maksimal 2MB.</p>
                    @if (isset($partner) && $partner->gambar)
                        <div class="flex items-center gap-1.5 mt-2">
                            <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-[11px] text-gray-400">File tersimpan: {{ $partner->gambar }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Status --}}
        <div class="pt-2">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}
                    class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                <span class="ml-3.5 text-sm font-medium text-gray-700">Tampilkan partner ini di halaman depan</span>
            </label>
        </div>
    </div>
</div>

<script>
    document.querySelector('input[name="is_active"]').addEventListener('change', function () {
        var label = this.parentElement.querySelector('span:last-child');
        label.textContent = this.checked ? 'Tampilkan partner ini di halaman depan' : 'Partner disembunyikan dari halaman depan';
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
        img.className = 'w-full h-full object-contain p-3';
        preview.appendChild(img);
    });
</script>
