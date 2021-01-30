<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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
        $this->call(UsersTableSeeder::class);

        // DB::table('users')->insert([
        //     'name' => 'User1',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('password'),
        // ]);


        $faker = Faker::create();
    
        foreach (range(1,10) as $index){
            DB::table('companies')->insert([
            'name' => $faker->company(),
            'email' => $faker->email(10).'@gmail.com',
            'logo' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
            'webiste' => $faker->domainName(),
            
            ]);
        }
        
        
        foreach (range(1,10) as $index){
            DB::table('employees')->insert([
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'company' => $faker->company(),
            'email' => $faker->str_random(10).'@gmail.com',
            'phone' => $faker->e164PhoneNumber(),
            
            ]);
        }



    }




}
