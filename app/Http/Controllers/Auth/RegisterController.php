<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Manger;
use App\Models\Freelancer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            "name" => "required|string|min:0|max:255",
			"image" => "nullable|file|min:0|max:2048",
			"cover" => "nullable|file|min:0|max:2048",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
			"contact_number" => "required|string|min:0|max:255",
			"birth_date" => "required|date",
			"gender" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.gender')))."",
			"marital_status" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.marital_status')))."",
			"nationality" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.nationality')))."",
			"city" => "nullable|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.city')))."",
			"country" => "nullable|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.country')))."",
			"address_details" => "nullable|string|min:0|max:255",
			"roleable_type" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.roleable_type')))."",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['roleable_type']) && $data['roleable_type']==Manger::class){
            $temp = Manger::create($data);
        }else if(isset($data['roleable_type']) && $data['roleable_type']==Freelancer::class){
            $temp = Freelancer::create($data);
        }else{
            $temp = null;
        }
        $data['password'] = Hash::make($data['password']);
        $data['roleable_id'] = $temp?->id;
        return User::create($data);
    }
}
