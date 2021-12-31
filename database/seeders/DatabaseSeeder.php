<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::factory()->create([
			'name'              => 'bidzina',
			'username'          => 'zaxarichi',
			'email'             => 'zaxarichi@gmail.com',
			'email_verified_at' => now(),
			'password'          => 'password',
			'remember_token'    => Str::random(10),
		]);
		User::factory(5)->create();
		Post::factory(5)->create();
		Category::factory(5)->create();
		Comment::factory(5)->create();
	}
}
