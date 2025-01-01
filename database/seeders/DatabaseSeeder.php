<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Freelancer;
use \App\Models\Manger;
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
        //     'name' => 'Test User',
        //     'email' => 'admin@fgws.ps',
        // ]);

        $temp = Freelancer::create([
            'main_career'       =>"Web Developer",
            'place_of_birth'    =>"Gaza",
        ]);

        $temp = User::create([
            'name'              =>"Freelancer Test",
            'image'             =>'\img\profile-no-image.jpg',
            'cover'             =>'\img\no-image.jpeg',
            'email'             =>'freelancer@fgws.ps',
            'password'          =>Hash::make('password'),
            'contact_number'    =>"0590000000",
            'birth_date'        =>now()->sub('P25Y'),
            'gender'            =>User::GENDER_FEMALE,
            'marital_status'    =>User::MARITAL_STATUS_MARRIED,
            'nationality'       =>User::NATIONALITY_PAL,
            'city'              =>'ps',
            'country'           =>'ps-gz',
            'address_details'   =>"MORE DETAILS",
            'roleable_type'     =>Freelancer::class,
            'roleable_id'       =>$temp->id,
        ]);

        $temp = Manger::create([
            'company_name'      =>"Coputer for Tech.",
            'company_objectives'=>"Some objects",
            'company_employees' =>"Some Employees",
        ]);

        $temp = User::create([
            'name'              =>"Manager Test",
            'image'             =>'\img\profile-no-image.jpg',
            'cover'             =>'\img\no-image.jpeg',
            'email'             =>'manager@fgws.ps',
            'password'          =>Hash::make('password'),
            'contact_number'    =>"0591111111",
            'birth_date'        =>now()->sub('P20Y'),
            'gender'            =>User::GENDER_FEMALE,
            'marital_status'    =>User::MARITAL_STATUS_SINGLE,
            'nationality'       =>User::NATIONALITY_OTHER,
            'city'              =>'ps',
            'country'           =>'ps-rf',
            'address_details'   =>"MORE DETAILS",
            'roleable_type'     =>Manger::class,
            'roleable_id'       =>$temp->id,
        ]);

    }
}
