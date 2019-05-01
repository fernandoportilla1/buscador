<?php

namespace App\Models;

class ElasticsearchRepository 
{
	private $client;

	public function __construct($client)
	{
		$this->client = $client;
	}

	public function search($q = '')
	{
		$article = new Article();

		$params = [
		    'index' => $article->getTable(),
		    'type' => $article->getTable(),
		    'body' => [
		        'query' => [
		            'multi_match' => [
		                'query' => $q,
		                'fields' => ['title','tags']
		            ]
		        ]
		    ]
		];

		$response = $this->client->search($params);

		return $response;
	}
}