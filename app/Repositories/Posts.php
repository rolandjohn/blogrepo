<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

class Posts

{
	protected $redis;

	public function __construct(Redis $redis)

	{


		$this->redis = $redis;

	}

	public function all()

	{
		$posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->get();
		return $posts;

	}

}