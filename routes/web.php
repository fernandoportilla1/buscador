<?php

Route::get('/', function (Elasticsearch\Client $client) {
    return view('welcome');
});
