<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;
use \App\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->paginate(5);
        } else {
            $articles = Article::latest()->paginate(5);
        }

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'thumbnail', 'img', 'excerpt', 'body']));
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect()->route('welcome');
    }

    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article)
    {
        $this->validateArticle();
        $article->update(request(['title', 'thumbnail', 'img', 'excerpt', 'body']));
        // удаляем все теги и записываем по новой
        $article->tags()->detach();
        $article->tags()->attach(request('tags'));

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
            'tags' => 'exists:tags,id'
        ]);
    }
}
