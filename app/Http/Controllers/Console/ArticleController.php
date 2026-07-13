<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $articles = Article::with('category')
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%'.$request->search.'%')->orWhere('excerpt', 'like', '%'.$request->search.'%'))
            ->when($request->filled('category'), fn ($q) => $q->where('category_id', $request->category))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('date_from'), fn ($q) => $q->where(fn ($q) => $q->whereDate('published_at', '>=', $request->date_from)->orWhereDate('created_at', '>=', $request->date_from)))
            ->when($request->filled('date_to'), fn ($q) => $q->where(fn ($q) => $q->whereDate('published_at', '<=', $request->date_to)->orWhereDate('created_at', '<=', $request->date_to)))
            ->latest()
            ->get();

        $categories = Category::all();

        return view('console.articles.index', compact('articles', 'categories'));
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
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'author' => ['required', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['status'] = $request->filled('published_at') ? 'publish' : 'draft';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'sftp');
        }

        Article::create($validated);

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
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'author' => ['required', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['status'] = $request->filled('published_at') ? 'publish' : 'draft';

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('sftp')->delete($article->image);
            }
            $validated['image'] = $request->file('image')->store('articles', 'sftp');
        }

        $article->update($validated);

        return redirect()->route('console.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        if ($article->image) {
            Storage::disk('sftp')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('console.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
