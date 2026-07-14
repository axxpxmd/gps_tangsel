<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Services\ImageConversionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(protected ImageConversionService $imageService) {}

    public function index(Request $request): View
    {
        $query = Article::with('category')
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%'.$request->search.'%')->orWhere('excerpt', 'like', '%'.$request->search.'%'))
            ->when($request->filled('category'), fn ($q) => $q->where('category_id', $request->category))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('date_from'), fn ($q) => $q->where(fn ($q) => $q->whereDate('published_at', '>=', $request->date_from)->orWhereDate('created_at', '>=', $request->date_from)))
            ->when($request->filled('date_to'), fn ($q) => $q->where(fn ($q) => $q->whereDate('published_at', '<=', $request->date_to)->orWhereDate('created_at', '<=', $request->date_to)));

        $articles = $query->latest()->paginate(10)->withQueryString();

        $categories = Category::all();
        $totalArticles = Article::count();
        $publishedCount = Article::where('status', 'publish')->count();
        $draftCount = Article::where('status', 'draft')->count();

        return view('console.articles.index', compact('articles', 'categories', 'totalArticles', 'publishedCount', 'draftCount'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('console.articles.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['author'] = auth()->user()->name;
        $validated['slug'] = $this->uniqueSlug(Str::slug($validated['title']));

        $status = $request->input('status');
        $validated['status'] = ($status === 'publish' || $request->filled('published_at')) ? 'publish' : 'draft';
        if ($validated['status'] === 'publish' && ! $request->filled('published_at')) {
            $validated['published_at'] = now();
        }

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $uploadedImages[] = $this->imageService->uploadAndConvertToWebp($file, 'articles');
            }
            if (! empty($uploadedImages)) {
                $validated['image'] = $uploadedImages[0];
            }
        }

        $article = Article::create($validated);

        if (! empty($uploadedImages)) {
            foreach ($uploadedImages as $index => $path) {
                $article->images()->create([
                    'image' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('console.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Article $article): View
    {
        $article->load('category');

        return view('console.articles.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        $categories = Category::all();

        return view('console.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = $this->uniqueSlug(Str::slug($validated['title']), $article->id);

        $status = $request->input('status');
        $validated['status'] = ($status === 'publish' || $request->filled('published_at')) ? 'publish' : 'draft';
        if ($validated['status'] === 'publish' && ! $request->filled('published_at')) {
            $validated['published_at'] = now();
        } elseif ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $file) {
                $uploadedImages[] = $this->imageService->uploadAndConvertToWebp($file, 'articles');
            }
            if (! empty($uploadedImages)) {
                $nextOrder = $article->images()->max('sort_order') + 1;
                foreach ($uploadedImages as $index => $path) {
                    $article->images()->create([
                        'image' => $path,
                        'sort_order' => $nextOrder + $index,
                    ]);
                }
                if (! $article->image) {
                    $validated['image'] = $uploadedImages[0];
                }
            }
        }

        $removeImages = $request->input('remove_images', []);
        if (! empty($removeImages)) {
            foreach ($removeImages as $removeId) {
                if (str_starts_with($removeId, 'main_')) {
                    if ($article->image) {
                        $this->imageService->deleteFile($article->image);
                    }
                    $validated['image'] = $article->images()->first()?->image ?? null;
                } elseif (str_starts_with($removeId, 'img_')) {
                    $imgId = (int) str_replace('img_', '', $removeId);
                    $img = $article->images()->find($imgId);
                    if ($img) {
                        $this->imageService->deleteFile($img->image);
                        $img->delete();
                    }
                }
            }
            if (! $article->image && ! isset($validated['image'])) {
                $validated['image'] = $article->images()->first()?->image ?? null;
            }
        }

        $article->update($validated);

        return redirect()->route('console.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->imageService->deleteFile($article->image);

        $article->delete();

        return redirect()->route('console.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }

    private function uniqueSlug(string $slug, ?int $excludeId = null): string
    {
        $originalSlug = $slug;
        $counter = 1;

        while (Article::where('slug', $slug)->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))->exists()) {
            $slug = $originalSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
