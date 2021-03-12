<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([             
        	"name" => "devan",             
        	"email" => "devan@gmail.com",             
        	"hak_akses" =>"administrator",             
        	"password" => Hash::make('Admin12345')         
        ]);
    }
}
