<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'agent', 'client'];
        
        App\TravelAgency::create([
            'name' => 'Travel Agency 1',
            'email' => 'travel-agency-1@gmail.com',
            'address' => 'address travel agency 1',
            'phone' => '0675005050',
        ]);

        App\TravelAgency::create([
            'name' => 'Travel Agency 2',
            'email' => 'travel-agency-2@gmail.com',
            'address' => 'address travel agency 2',
            'phone' => '0675001010',
        ]);

        App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => $roles[0], 
        ]);

        App\User::create([
            'name' => 'agent',
            'email' => 'agent@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => $roles[1], 
            'travel_agency_id' => '1',
        ]);

        App\User::create([
            'name' => 'user-1',
            'email' => 'user-1@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => $roles[2], 
            'travel_agency_id' => '1',
        ]);

        App\User::create([
            'name' => 'user-2',
            'email' => 'user-2@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => $roles[2], 
            'travel_agency_id' => '1',
        ]);

        App\User::create([
            'name' => 'user-3',
            'email' => 'user-3@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => $roles[2], 
            'travel_agency_id' => '2',
        ]);

        App\User::create([
            'name' => 'user-4',
            'email' => 'user-4@gmail.com',
            'password' => Hash::make('1234567'),
            'role' => $roles[2], 
            'block' => true,
            'travel_agency_id' => '2',
        ]);

        App\Tour::create([
            'country' => 'UAE', 
            'city' => 'Dubai', 
            'hotel' => 'Dubai 5 stars', 
            'food' => 'full', 
            'people' => 3, 
            'price' => 2000, 
            'date_start' => '2018-12-15', 
            'date_end' => '2018-12-20', 
            'status' => 'Completed', 
        ]);

        App\Tour::create([
            'country' => 'Turkey', 
            'city' => 'Ankara', 
            'hotel' => 'Ankara 5 stars', 
            'food' => 'dinner', 
            'people' => 2, 
            'price' => 1000, 
            'date_start' => '2018-12-30', 
            'date_end' => '2019-01-10', 
            'status' => 'Waiting payment', 
        ]);

        App\Tour::create([
            'country' => 'Egypt', 
            'city' => 'Cairo', 
            'hotel' => 'Cairo 5 stars', 
            'food' => 'full', 
            'people' => 2, 
            'price' => 1500, 
            'date_start' => '2019-01-10', 
            'date_end' => '2019-01-20', 
            'status' => 'Paid', 
        ]);

        App\UsersTour::create([
            'user_id' => 3,
            'tour_id' => 1,
        ]);

        App\UsersTour::create([
            'user_id' => 3,
            'tour_id' => 2,
        ]);

        App\UsersTour::create([
            'user_id' => 4,
            'tour_id' => 3,
        ]);
    }
}
