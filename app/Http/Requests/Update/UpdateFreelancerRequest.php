<?php

namespace App\Http\Requests\Update;

use App\Models\Freelancer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateFreelancerRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('update', $this->freelancer);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"name" => "required|string|min:0|max:255",
			"image" => "nullable|file|min:0|max:2048",
			"cover" => "nullable|file|min:0|max:2048",
			"email" => "required|email|min:0|max:255",
			"contact_number" => "required|string|min:0|max:255",
			"birth_date" => "required|date",
			"gender" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.gender')))."",
			"marital_status" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.marital_status')))."",
			"nationality" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.nationality')))."",
			"city" => "nullable|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.city')))."",
			"country" => "nullable|string|min:0|max:255|in:".implode(',',array_keys(__('values.user.country')))."",
			"address_details" => "nullable|string|min:0|max:255",
			// "roleable_type" => "nullable|string|min:0|max:255",
			"main_career" => "required|string|min:0|max:255",
			"place_of_birth" => "nullable|string|min:0|max:255",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.freelancer');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['name'] = htmlspecialchars($temp['name']??null);
		$temp['contact_number'] = htmlspecialchars($temp['contact_number']??null);
		// $temp['nationality'] = htmlspecialchars($temp['nationality']??null);
		// $temp['city'] = htmlspecialchars($temp['city']??null);
		// $temp['country'] = htmlspecialchars($temp['country']??null);
		$temp['address_details'] = htmlspecialchars($temp['address_details']??null);
		$temp['roleable_type'] = Freelancer::class;
		$temp['main_career'] = htmlspecialchars($temp['main_career']??null);
		$temp['place_of_birth'] = htmlspecialchars($temp['place_of_birth']??null);
		return $temp;
	}

	public function messages()
	{
		return [
			//"attribute.validation" => "Custom Message",
		];
	}
}
