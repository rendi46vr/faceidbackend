<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Rendi',
        //     'email' => 'rendi46vr@gmail.com',
        //     'password'=> Hash::make('123123123')
        // ]);

        // // create data dummy for company model
        // Company::create([
        //     'name'=> 'PT Andra Sarpan',
        //     'email'=> 'andrasarpan@gmail.com',
        //     'address'=> 'Jln. Gatot Subroto No. 123',
        //     'latitude'=> '-6.2250',
        //     'longitude'=> '106.8213',
        //     'radius_km'=> '0.5',
        //     'time_in' => '08:00',
        //     'time_out' => '17:00'

        // ]);



        $this->call([
            // AttendanceSeeder::class,
            PermissionSeeder::class,
        ]);

    }
}
