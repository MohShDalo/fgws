<?php

namespace App\Http\Requests\Update;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('update', $this->user);
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
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.user');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['name'] = htmlspecialchars($temp['name']??null);
		$temp['image'] = htmlspecialchars($temp['image']??null);
		$temp['cover'] = htmlspecialchars($temp['cover']??null);
		$temp['email'] = htmlspecialchars($temp['email']??null);
		$temp['contact_number'] = htmlspecialchars($temp['contact_number']??null);
		$temp['gender'] = htmlspecialchars($temp['gender']??null);
		$temp['marital_status'] = htmlspecialchars($temp['marital_status']??null);
		$temp['nationality'] = htmlspecialchars($temp['nationality']??null);
		$temp['city'] = htmlspecialchars($temp['city']??null);
		$temp['country'] = htmlspecialchars($temp['country']??null);
		$temp['address_details'] = htmlspecialchars($temp['address_details']??null);
		$temp['roleable_type'] = htmlspecialchars($temp['roleable_type']??null);
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
