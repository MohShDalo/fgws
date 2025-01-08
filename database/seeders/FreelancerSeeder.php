<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Freelancer;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FreelancerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Freelancer::factory()
		->count(2)
        ->hasPosts(2)
        ->hasOffers(2)
        ->hasEducations(2)
        ->hasLanguages(2)
        ->hasCertificates(2)
        ->hasExperiences(2)
        ->hasSkills(2)
        ->hasPortfolios(2)
        ->hasReferences(2)
		->create();

        $temp = User::create([
            'name'              =>"Aya Mazen Alarayshi",
            'image'             =>'/img/profile-no-image.jpg',
            'cover'             =>'/img/no-image.jpeg',
            'email'             =>'aya-a@fgws.ps',
            'password'          =>Hash::make('password'),
            'contact_number'    =>"20190771",
            'birth_date'        =>'07-04-2002',
            'gender'            =>User::GENDER_FEMALE,
            'marital_status'    =>User::MARITAL_STATUS_MARRIED,
            'nationality'       =>User::NATIONALITY_PAL,
            'city'              =>'ps',
            'country'           =>'ps-gz',
            'address_details'   =>"MORE DETAILS",
            'roleable_type'     =>Freelancer::class,
            'roleable_id'       =>1,
        ]);

        $temp = User::create([
            'name'              =>"Aya Ali Dahalan",
            'image'             =>'/img/profile-no-image.jpg',
            'cover'             =>'/img/no-image.jpeg',
            'email'             =>'aya-d@fgws.ps',
            'password'          =>Hash::make('password'),
            'contact_number'    =>"20191725",
            'birth_date'        =>now()->sub('P22Y'),
            'gender'            =>User::GENDER_FEMALE,
            'marital_status'    =>User::MARITAL_STATUS_SINGLE,
            'nationality'       =>User::NATIONALITY_PAL,
            'city'              =>'ps',
            'country'           =>'ps-gz',
            'address_details'   =>"MORE DETAILS",
            'roleable_type'     =>Freelancer::class,
            'roleable_id'       =>2,
        ]);

	}
}
