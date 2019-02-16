<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Raphael Oliveira',
                'email' => 'raphael.oliveira@lasalle.org.br',
                'profile' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Fernanda Chamberlini',
                'email' => 'fernanda.chamberlini@lasalle.org.br',
                'profile' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Cristiano silva',
                'email' => 'cristiano.silva@lasalle.org.br',
                'profile' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ], 
            [
                'name' => 'Leilson Fernandes',
                'email' => 'leilson.fernandes@lasalle.org.br',
                'profile' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],           
            [
                'name' => 'Isabela Freitas',
                'email' => 'isabela.freitas@lasalle.org.br',
                'profile' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ], 
        ]);
    }
}
