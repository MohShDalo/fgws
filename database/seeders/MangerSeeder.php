<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manger;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MangerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Manger::factory()
		// ->count(3)
		// ->create();


        $temp = Manger::create([
            'company_name'      =>"Coputer for Tech.",
            'company_objectives'=>"Some objects",
            'company_employees' =>"Some Employees",
        ]);

        $temp = User::create([
            'name'              =>"Manager Test",
            'image'             =>'/img/profile-no-image.jpg',
            'cover'             =>'/img/no-image.jpeg',
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
            'roleable_id'       =>2,
        ]);

	}
}
