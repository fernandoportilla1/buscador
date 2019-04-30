<?php

namespace App\Http\Controllers;

use App\Models\ElasticsearchRepository;
use Illuminate\Http\Request;
use App\Models\Article;

class SearcherController extends Controller
{
    public function home() 
    {
        return view('searcher');
    }

    public function search(Request $request, ElasticsearchRepository $client) 
    {
		$articles = $client->search($request->input('q', ''));
		$articles = $this->mapToModel($articles['hits']['hits']);
        return $articles;
		// return view('searcher', compact("articles"));
    }

    public function mapToModel($articles)
    {
    	$source = array_map(function($source) {
    		$article = new Article;
    		$article->id = $source['_id'];
    		$article->title = $source['_source']['title'];
    		return $article;
    	}, $articles);

    	return $source;
    }
}
