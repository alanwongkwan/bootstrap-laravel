<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $article = new Article($this->validateArticle());

        $article->title = request('title');
        $article->thumbnail = request('thumbnail');
        $article->img = request('img');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->tag = request('tag');

        $article->save();

        return redirect()->route('welcome');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect(route('article.show', $article));
    }

    public function destroy($article)
    {
        $post = Article::find($article);
        if ($post) {
            $post->delete();
        }

        return redirect()->route('welcome');
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'thumbnail' => 'required',
            'img' => 'required',
            'excerpt' => ['required', 'min:10', 'max:255'],
            'body' => ['required', 'min:10'],
            'tag' => 'required'
        ]);
    }
}
