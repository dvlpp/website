<?php


class UserSeeder extends \Illuminate\Database\Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            "name" => "admin",
            "email" => "philippelonchampt@gmail.com",
            "password" => bcrypt(env("SHARP_PWD", "admin"))
        ]);
    }
}