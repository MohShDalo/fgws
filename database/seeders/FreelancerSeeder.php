<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Freelancer;
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
		->count(1)
        ->hasEducations(2)
        ->hasLanguages(2)
        ->hasCertificates(2)
        ->hasExperiences(2)
        ->hasSkills(2)
        ->hasPortfolios(2)
        ->hasReferences(2)
		->create();

        // $temp = Freelancer::create([
        //     'main_career'       =>"Web Developer",
        //     'place_of_birth'    =>"Gaza",
        // ]);

        $temp = User::create([
            'name'              =>"Freelancer Test",
            'image'             =>'/img/profile-no-image.jpg',
            'cover'             =>'/img/no-image.jpeg',
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
            'roleable_id'       =>1,
        ]);


	}
}
