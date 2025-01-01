<?php

namespace App\Http\Requests\Store;

use App\Models\Manger;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreMangerRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('create', Manger::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"company_name" => "required|nullable|string|min:0|max:255",
			"company_objectives" => "required|nullable|string|min:0|max:255",
			"company_employees" => "required|nullable|string|min:0|max:255",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.manger');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['company_name'] = htmlspecialchars($temp['company_name']??null);
		$temp['company_objectives'] = htmlspecialchars($temp['company_objectives']??null);
		$temp['company_employees'] = htmlspecialchars($temp['company_employees']??null);
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
