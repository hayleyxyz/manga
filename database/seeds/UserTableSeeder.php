<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 03/06/2015
 * Time: 16:59
 */

class UserTableSeeder extends \Illuminate\Database\Seeder {

    public function run() {
        \App\User::create([
            'email' => 'oscar@madokami.com',
            'password' => bcrypt('password'),
        ]);
    }

}