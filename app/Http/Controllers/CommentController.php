<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
        return view('comments.index', ['comments' => $comments]);
    }

    public function create(Request $request)
    {
        // создавать комментарий можно к конкретной статье: /comment/create?article_id=1
        $article = Article::findOrFail($request->query('article_id'));
        return view('comments.create', ['article' => $article]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'article_id' => 'required|exists:articles,id',
        ]);

        Comment::create([
            'body' => $request->body,
            'article_id' => $request->article_id,
        ]);

        return redirect()->route('article.show', $request->article_id);
    }

    public function show(Comment $comment)
    {
        return view('comments.show', ['comment' => $comment]);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('article.show', $comment->article_id);
    }

    public function destroy(Comment $comment)
    {
        $articleId = $comment->article_id;
        $comment->delete();

        return redirect()->route('article.show', $articleId);
    }
}