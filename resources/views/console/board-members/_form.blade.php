<div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
    <div class="px-6 sm:px-8 py-4 border-b border-gray-100 flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
        </div>
        <div><h3 class="text-sm font-bold text-gray-900">Informasi Pengurus</h3><p class="text-[11px] text-gray-400">Lengkapi data pengurus GPS TangSel</p></div>
    </div>

    <div class="p-6 sm:p-8 space-y-6">
        {{-- Name --}}
        <div>
            <label for="name" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                Nama <span class="text-red-400">*</span>
            </label>
            <input type="text" id="name" name="name" value="{{ old('name', $member->name ?? '') }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                placeholder="Ustadz Moh. Sartono">
        </div>

        {{-- Position & Group --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="position" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/></svg>
                    Jabatan <span class="text-red-400">*</span>
                </label>
                <input type="text" id="position" name="position" value="{{ old('position', $member->position ?? '') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                    placeholder="Ketua / Sekretaris / Bendahara">
            </div>
            <div>
                <label for="group" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                    Kelompok <span class="text-red-400">*</span>
                </label>
                <select id="group" name="group" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all">
                    <option value="">Pilih Kelompok</option>
                    <option value="pembina" {{ old('group', $member->group ?? '') === 'pembina' ? 'selected' : '' }}>Dewan Pembina</option>
                    <option value="pengawas" {{ old('group', $member->group ?? '') === 'pengawas' ? 'selected' : '' }}>Dewan Pengawas</option>
                    <option value="pengurus_harian" {{ old('group', $member->group ?? '') === 'pengurus_harian' ? 'selected' : '' }}>Dewan Pengurus Harian</option>
                </select>
            </div>
        </div>

        {{-- Phone --}}
        <div>
            <label for="phone" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-1.5">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/></svg>
                Nomor Telepon / WA
            </label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $member->phone ?? '') }}"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"
                placeholder="+62 877-9401-0968">
        </div>

        {{-- Foto --}}
        <div>
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                Foto Profil
            </label>
            <div class="flex items-start gap-5">
                <div class="w-28 h-28 rounded-full bg-gray-50 border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0" id="gambar-preview">
                    @if (isset($member) && $member->gambar_url)
                        <img src="{{ $member->gambar_url }}" alt="Preview" class="w-full h-full object-cover" id="preview-img">
                    @else
                        <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24" id="preview-placeholder"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                    @endif
                </div>
                <div class="flex-1">
                    <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:transition-colors file:cursor-pointer">
                    <p class="text-[11px] text-gray-400 mt-2.5">Format JPG, PNG, atau WebP. Maksimal 2MB.</p>
                    @if (isset($member) && $member->gambar)
                        <div class="flex items-center gap-1.5 mt-2"><svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span class="text-[11px] text-gray-400">File tersimpan: {{ $member->gambar }}</span></div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Status --}}
        <div class="pt-2">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }} class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                <span class="ml-3.5 text-sm font-medium text-gray-700">Tampilkan di halaman depan</span>
            </label>
        </div>
    </div>
</div>

<script>
    document.querySelector('input[name="is_active"]').addEventListener('change', function () {
        var label = this.parentElement.querySelector('span:last-child');
        label.textContent = this.checked ? 'Tampilkan di halaman depan' : 'Disembunyikan dari halaman depan';
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
