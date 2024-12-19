<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ArticleController extends BaseController
{
    public function __construct()
    {
        $this->model = Article::class;
        $this->relation = [];
        $this->allowedFilters = [];
        $this->allowedIncludes = [];
        $this->allowedSorts = ['id'];
    }

    public function index()
    {
        $articles =  QueryBuilder::for($this->model)
            ->with($this->relation)
            ->allowedFilters($this->allowedFilters)
            ->allowedIncludes($this->allowedIncludes)
            ->allowedSorts($this->allowedIncludes)
            ->defaultSorts("-id")
            ->simplePaginate(6);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $model = app()->make($this->model);
        $validatedData = $request->validate($model->storeRules());
        // return $validatedData;
        $data = $model::create($validatedData);
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $media = $data->addMedia($image)->toMediaCollection('featured_image');
        }

        return redirect()->route('articles.index');
    }

    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.update', ['article' => $article]);
    }

    public function update(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $validatedData = $request->validate($article->updateRules($article->id));
        $article->update($validatedData);
        if ($request->hasFile('featured_image')) {
            if ($article->hasMedia('featured_image')) {
                $article->getFirstMedia('featured_image')->delete();
            }
            $image = $request->file('featured_image');
            $article->addMedia($image)->toMediaCollection('featured_image');
        }
        return redirect()->route('article.show', $article->slug)
            ->with('success', 'Article updated successfully!');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', ['article' => $article]);
    }

    public function destroy($id)
    {
        // dd($id);
        $model = app()->make($this->model);
        $modelData = $model->findOrFail($id);
        $modelData->delete();

        return redirect()->route('articles.index');
    }
}
