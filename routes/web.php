<?php

Route::get('/', function (Elasticsearch\Client $client) {
/*	$params = [
	    'index' => 'articles'
	];

	$response = $client->indices()->create($params);
	dd($response);*/
    return view('welcome');
});

Route::get('/searcher', 'SearcherController@search')->name('searcher');