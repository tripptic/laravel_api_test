<?php

use Illuminate\Database\Seeder;
use App\Good;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GoodTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

class GoodTableSeeder extends Seeder {

    public function run()
    {
        DB::table('goods')->delete();

        Good::create(['id' => 1, 'caption' => ["ru" => "Товар 1","en" => "Goods 1"]]);
        Good::create(['id' => 2, 'caption' => ["ru" => "Товар 2","en" => "Goods 2"]]);
        Good::create(['id' => 3, 'caption' => ["ru" => "Товар 3","en" => "Goods 3"]]);
        Good::create(['id' => 4, 'caption' => ["ru" => "Товар 4","en" => "Goods 4"]]);
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['id' => 1, 'name' => 'User 1', 'goods_id' => []]);
        User::create(['id' => 2, 'name' => 'User 2', 'goods_id' => [1,2]]);
        User::create(['id' => 3, 'name' => 'User 3', 'goods_id' => [2]]);
        User::create(['id' => 4, 'name' => 'User 4', 'goods_id' => [3,4]]);
    }

}