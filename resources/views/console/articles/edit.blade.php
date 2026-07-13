@extends('console.layout')

@section('title', 'Edit Artikel')
@section('page_title', 'Edit Artikel')

@push('scripts_head')
<script src="https://cdn.tiny.cloud/1/kmpjl2vq2hx8zh493a02m8sxahks3nt4inhuoqxbxn3i17bj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
            </svg>
        </div>
        <div>
            <h2 class="text-base font-extrabold text-gray-900">Edit Artikel</h2>
            <p class="text-xs text-gray-400">{{ $article->title }}</p>
        </div>
    </div>

    <form action="{{ route('console.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-5">
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1.5">Judul Artikel <span class="text-red-400">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl border @error('title') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Masukkan judul artikel yang menarik...">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Kategori</label>
                        <select id="category_id" name="category_id"
                            class="w-full px-4 py-3 rounded-xl border @error('category_id') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            <option value="">— Pilih Kategori —</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $article->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="author" class="block text-sm font-semibold text-gray-700 mb-1.5">Penulis <span class="text-red-400">*</span></label>
                        <input type="text" id="author" name="author" value="{{ old('author', $article->author) }}" required
                            class="w-full px-4 py-3 rounded-xl border @error('author') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Nama penulis">
                        @error('author')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="read_time" class="block text-sm font-semibold text-gray-700 mb-1.5">Estimasi Baca (menit) <span class="text-red-400">*</span></label>
                        <input type="number" id="read_time" name="read_time" value="{{ old('read_time', $article->read_time) }}" required min="1" max="60"
                            class="w-full px-4 py-3 rounded-xl border @error('read_time') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        @error('read_time')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="published_at" class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Publikasi</label>
                        <input type="datetime-local" id="published_at" name="published_at"
                            value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}"
                            class="w-full px-4 py-3 rounded-xl border @error('published_at') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <p class="text-xs text-gray-400 mt-1">Kosongkan untuk menyimpan sebagai draft.</p>
                        @error('published_at')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Gambar Utama</label>
                        @if ($article->image)
                            <div class="flex items-center gap-3 mb-3">
                                <img src="{{ $article->image }}" alt="" class="w-16 h-16 rounded-xl object-cover bg-gray-100">
                                <span class="text-xs text-gray-400">{{ basename($article->image) }}</span>
                            </div>
                        @endif
                        <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary-light file:text-primary hover:file:bg-primary/20 file:transition-colors file:cursor-pointer">
                        <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah gambar. Format: JPG, PNG, WebP. Maks 2MB.</p>
                        @error('image')
                            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <label for="excerpt" class="block text-sm font-semibold text-gray-700 mb-1.5">Kutipan / Ringkasan <span class="text-red-400">*</span></label>
                <textarea id="excerpt" name="excerpt" rows="3" required
                    class="w-full px-4 py-3 rounded-xl border @error('excerpt') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                    placeholder="Tulis ringkasan singkat artikel...">{{ old('excerpt', $article->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <label for="content" class="block text-sm font-semibold text-gray-700 mb-3">Konten Artikel <span class="text-red-400">*</span></label>
                <textarea id="content" name="content">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('console.articles.index') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                    </svg>
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary to-primary-dark text-white text-sm font-semibold rounded-xl hover:shadow-lg hover:shadow-primary/25 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>
                    Perbarui Artikel
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: 'file edit view insert format tools table',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
            'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | table | removeformat | fullscreen | code',
        block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4',
        content_style: 'body { font-family: Plus Jakarta Sans, Inter, sans-serif; font-size: 14px; line-height: 1.8; color: #374151; }',
        promotion: false,
        license_key: 'gpl',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
@endpush
