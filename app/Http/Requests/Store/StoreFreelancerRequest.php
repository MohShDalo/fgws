<?php

namespace App\Http\Requests\Store;

use App\Models\Freelancer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreFreelancerRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Freelancer::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"main_career" => "required|nullable|string|min:0|max:255",
			"place_of_birth" => "required|nullable|string|min:0|max:255",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.freelancer');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['main_career'] = htmlspecialchars($temp['main_career']??null);
		$temp['place_of_birth'] = htmlspecialchars($temp['place_of_birth']??null);
		// some extra information
		return $temp;
	}

	public function messages()
	{
		return [
			//"attribute.validation" => "Custom Message",
		];
	}
}
