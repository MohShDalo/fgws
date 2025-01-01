<?php

namespace App\Http\Requests\Update;

use App\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateExperienceRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->experience);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"postion" => "required|nullable|string|min:0|max:255",
			"company_name" => "required|nullable|string|min:0|max:255",
			"company_address" => "required|nullable|string|min:0|max:255",
			"start_date" => "required|nullable|date",
			"end_date" => "required|nullable|date",
			"category" => "required|nullable|string|min:0|max:255|in:value1,value2",
			"note" => "required|nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.experience');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['postion'] = htmlspecialchars($temp['postion']??null);
		$temp['company_name'] = htmlspecialchars($temp['company_name']??null);
		$temp['company_address'] = htmlspecialchars($temp['company_address']??null);
		$temp['category'] = htmlspecialchars($temp['category']??null);
		$temp['note'] = htmlspecialchars($temp['note']??null);
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
