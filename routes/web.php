<?php

Route::get('/', function (Elasticsearch\Client $client) {
/*	$params = [
	    'index' => 'articles'
	];

	$response = $client->indices()->create($params);
	dd($response);*/
    return view('welcome');
});

Route::get('/searcher', 'SearcherController@home');
Route::get('/search', 'SearcherController@search');
