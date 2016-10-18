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
      DB::table('users')->insert([
          'first_name' => 'Kevin',
          'last_name'  => 'Cunanan',
          'image_url'  => 'http://kevincunanan.me/img/profile.png',
          'bio'=> 'Kevin Cunanan is a undergraduate attending Claremont McKenna College. He loves cats, volleyball, and coding in that order.',
          'email'      => 'kevin.a.cunanan@gmail.com',
          'password'   => '$2a$08$RMdjor7w7RtFAywF8mXTVeNjP6gHmMaKgBI1st4jDs2xMvqBYjIAK', // so they can't hack me muahaha
      ]);
    }
}
