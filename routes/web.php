<?php

/*
docker run -d  -p 9200:9200 -p 9300:9300 -e "discovery.type=single-node" docker.elastic.co/elasticsearch/elasticsearch:7.0.0
*/

/*

$client = app('Elasticsearch\Client');

$params = [
	'index' => 'articles'
];

$response = $client->indices()->create($params);
dd($response);
*/
Route::get('/', 'SearcherController@index');
Route::get('/search', 'SearcherController@search');
