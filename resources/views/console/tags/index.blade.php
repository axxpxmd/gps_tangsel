@php
    $initialEditTag = null;
    if ($errors->any() && old('_modal') === 'edit') {
        $initialEditTag = ['id' => (int) old('tag_id'), 'name' => old('name')];
    }
@endphp

@extends('console.layout')

@section('title', 'Tag')
@section('page_title', 'Tag')

@section('content')
<div x-data="{
    showModal: {{ $errors->any() ? 'true' : 'false' }},
    modalMode: @js(old('_modal', 'create')),
    editTag: @js($initialEditTag),

    openCreate() {
        this.modalMode = 'create';
        this.editTag = null;
        this.showModal = true;
        this.$nextTick(() => this.$refs.createInput?.focus());
    },
    openEdit(tag) {
        this.modalMode = 'edit';
        this.editTag = tag;
        this.showModal = true;
        this.$nextTick(() => this.$refs.editInput?.focus());
    },
    closeModal() {
        this.showModal = false;
    }
}">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-gray-900">Daftar Tag</h2>
            <p class="text-xs text-gray-400 mt-0.5">{{ $tags->count() }} tag tersimpan</p>
        </div>
        <button @click="openCreate()" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            Tambah Tag
        </button>
    </div>

    @if (session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl px-4 py-3 mb-6 text-sm font-medium">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($tags->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-200 p-16 text-center">
            <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                <svg class="w-10 h-10 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
                </svg>
            </div>
            <h3 class="text-base font-bold text-gray-900 mb-1">Belum Ada Tag</h3>
            <p class="text-sm text-gray-400">Klik tombol "Tambah Tag" untuk menambahkan tag pertama.</p>
        </div>
    @else
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px]">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/80">
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-12">#</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Nama</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Slug</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-36 hidden lg:table-cell">Tanggal</th>
                            <th class="text-right px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($tags as $tag)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-5 py-4">
                                    <span class="text-xs font-medium text-gray-400">{{ $loop->iteration }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <button @click="openEdit(@js(['id' => $tag->id, 'name' => $tag->name]))" class="text-sm font-semibold text-gray-900 hover:text-primary transition-colors duration-200 cursor-pointer">
                                        {{ $tag->name }}
                                    </button>
                                </td>
                                <td class="px-5 py-4">
                                    <code class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded">{{ $tag->slug }}</code>
                                </td>
                                <td class="px-5 py-4 hidden lg:table-cell">
                                    <span class="text-xs text-gray-500">{{ $tag->created_at->translatedFormat('d M Y, H:i') }}</span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <button @click="openEdit(@js(['id' => $tag->id, 'name' => $tag->name]))" class="p-2 rounded-lg text-gray-400 hover:text-primary hover:bg-primary/10 transition-colors duration-200 cursor-pointer" title="Edit">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                            </svg>
                                        </button>
                                        <form action="{{ route('console.tags.destroy', $tag) }}" method="POST" onsubmit="return confirm('Hapus tag &quot;{{ $tag->name }}&quot;?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors duration-200 cursor-pointer" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div x-cloak x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="closeModal()">
        <div class="fixed inset-0 bg-black/50 transition-opacity" @click="closeModal()"></div>

        <div class="min-h-full flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl border border-gray-200 w-full max-w-lg p-6 sm:p-8" @click.stop="">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                        <svg x-show="modalMode === 'create'" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        <svg x-show="modalMode === 'edit'" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                        </svg>
                    </div>
                    <div>
                        <h2 x-show="modalMode === 'create'" class="text-base font-extrabold text-gray-900">Tambah Tag</h2>
                        <h2 x-show="modalMode === 'edit'" class="text-base font-extrabold text-gray-900">Edit Tag</h2>
                        <p x-show="modalMode === 'create'" class="text-xs text-gray-400">Buat tag artikel baru</p>
                        <p x-show="modalMode === 'edit'" class="text-xs text-gray-400" x-text="editTag?.name"></p>
                    </div>
                </div>

                <form x-show="modalMode === 'create'" action="{{ route('console.tags.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_modal" value="create">

                    <div class="space-y-5">
                        <div>
                            <label for="create_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Tag</label>
                            <input type="text" id="create_name" name="name" x-ref="createInput" value="{{ old('_modal') === 'create' ? old('name') : '' }}" required
                                class="w-full px-4 py-3 rounded-2xl border {{ $errors->has('name') && old('_modal') === 'create' ? 'border-red-300 bg-red-50' : 'border-gray-200' }} text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="Masukkan nama tag">
                            @if(old('_modal') === 'create')
                                @error('name')
                                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <button type="button" @click="closeModal()" class="inline-flex items-center gap-1.5 px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200 cursor-pointer">
                            Batal
                        </button>
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>

                <form x-show="modalMode === 'edit'" :action="'{{ url('console/tags') }}/' + editTag?.id" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit">
                    <input type="hidden" name="tag_id" :value="editTag?.id">

                    <div class="space-y-5">
                        <div>
                            <label for="edit_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Tag</label>
                            <input type="text" id="edit_name" name="name" x-ref="editInput" :value="editTag?.name" required
                                class="w-full px-4 py-3 rounded-2xl border {{ $errors->has('name') && old('_modal') === 'edit' ? 'border-red-300 bg-red-50' : 'border-gray-200' }} text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="Masukkan nama tag">
                            @if(old('_modal') === 'edit')
                                @error('name')
                                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <button type="button" @click="closeModal()" class="inline-flex items-center gap-1.5 px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200 cursor-pointer">
                            Batal
                        </button>
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
