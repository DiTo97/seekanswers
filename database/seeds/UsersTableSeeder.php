<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function($fakeUser) {
            $fakeUser->getQuestions()
                ->saveMany(
                    factory(App\Question::class, mt_rand(1, 5))->make()
                );
        });
    }
}
