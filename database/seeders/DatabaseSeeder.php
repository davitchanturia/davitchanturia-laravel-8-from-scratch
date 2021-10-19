<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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


        // migrate:fresh დროს სანამ seed გაეშვება წაშლის ჩანაწერებს რო ორმაგად არ აისახოს ცხრილში
        User::truncate();
        Category::truncate();
        Post::truncate();


        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'work',
            'slug' => 'work'
        ]);

        $hobby = Category::create([
            'name' => 'hobbies',
            'slug' => 'hobbies'
        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => 'lorem ipsum dolar',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo esse ullam sit dolor magnam quibusdam iste iusto, maxime nostrum cum, repellat molestias similique quia distinctio provident exercitationem. Magnam facilis recusandae, nesciunt aperiam laborum saepe commodi id non ut eius enim.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'lorem ipsum dolar',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo esse ullam sit dolor magnam quibusdam iste iusto, maxime nostrum cum, repellat molestias similique quia distinctio provident exercitationem. Magnam facilis recusandae, nesciunt aperiam laborum saepe commodi id non ut eius enim.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'My Hobbies Post',
            'slug' => 'my-hobbies-post',
            'excerpt' => 'lorem ipsum dolar',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo esse ullam sit dolor magnam quibusdam iste iusto, maxime nostrum cum, repellat molestias similique quia distinctio provident exercitationem. Magnam facilis recusandae, nesciunt aperiam laborum saepe commodi id non ut eius enim.'
        ]);
    }
}
