<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleMail;
use App\Jobs\VeryLongJob;

class ArticleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Article::class);
        $articles = Article::latest()->paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles/create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Article::class);

        $request->validate([
            'datePublic' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);

        $article = new Article;
        $article->datePublic = $request->datePublic;
        $article->title = $request->title;
        $article->desc = $request->desc;
        $result = $article->save();
        if ($result) VeryLongJob::dispatch($article);
        return redirect(route('article.index'));
    }

    public function show(Article $article)
    {
        $this->authorize('view', $article);
        return view('articles/show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles/edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $request->validate([
            'datePublic' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);

        $article->datePublic = $request->datePublic;
        $article->title = $request->title;
        $article->desc = $request->desc;
        $article->save();

        return redirect(route('article.show', ['article' => $article->id]));
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->route('article.index');
    }
}