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
    public function index(): View
    {
        $articles = Article::with('category')->latest()->get();

        return view('console.articles.index', compact('articles'));
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
            'read_time' => ['required', 'integer', 'min:1', 'max:60'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

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
            'read_time' => ['required', 'integer', 'min:1', 'max:60'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

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
