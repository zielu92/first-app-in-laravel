<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        factory(App\User::class, 10)->create()->each(function($user){
            $user->post()->save(factory(App\Post::class)->make());
        });

        factory(App\Role::class, 3)->create();

        factory(App\Category::class, 3)->create();

        factory(App\Comment::class, 20)->create()->each(function ($c){

            $c->replies()->save(factory(App\CommentReply::class)->make());

        });



       //  $this->call(UsersTableSeeder::class);
    }
}
