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

		Manger::factory()
		->count(2)
        ->hasJobs(2)
		->create();

        $temp = User::create([
            'name'              =>"Sojod Talaat Abo Al-Qumboz",
            'image'             =>'/img/profile-no-image.jpg',
            'cover'             =>'/img/no-image.jpeg',
            'email'             =>'sojod-q@fgws.ps',
            'password'          =>Hash::make('password'),
            'contact_number'    =>"20191215",
            'birth_date'        =>now()->sub('P20Y'),
            'gender'            =>User::GENDER_FEMALE,
            'marital_status'    =>User::MARITAL_STATUS_SINGLE,
            'nationality'       =>User::NATIONALITY_OTHER,
            'city'              =>'ps',
            'country'           =>'ps-rf',
            'address_details'   =>"MORE DETAILS",
            'roleable_type'     =>Manger::class,
            'roleable_id'       =>1,
        ]);

        $temp = User::create([
            'name'              =>"Hala Awad Hijazi",
            'image'             =>'/img/profile-no-image.jpg',
            'cover'             =>'/img/no-image.jpeg',
            'email'             =>'hala-h@fgws.ps',
            'password'          =>Hash::make('password'),
            'contact_number'    =>"20192872",
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
