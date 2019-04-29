<?php

namespace App\Http\Controllers;

use App\Models\ElasticsearchRepository;
use Illuminate\Http\Request;
use App\Models\Article;

class SearcherController extends Controller
{
    public function search(Request $request, ElasticsearchRepository $client) 
    {
		$articles = $client->search($request->input('q', ''));
		$articles = $this->mapResult($articles['hits']['hits']);
		return view('searcher', compact("articles"));
    }

    public function mapResult($articles)
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
