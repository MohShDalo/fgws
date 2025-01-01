<?php

namespace App\Http\Requests\Update;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateLanguageRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->language);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"language" => "required|nullable|string|min:0|max:255",
			"category" => "required|nullable|string|min:0|max:255|in:value1,value2",
			"general_score" => "required|nullable|integer|min:0|max:100000",
			"speaking_score" => "required|nullable|integer|min:0|max:100000",
			"writing_score" => "required|nullable|integer|min:0|max:100000",
			"listening_score" => "required|nullable|integer|min:0|max:100000",
			"show_details" => "nullable|string|min:0|max:255",
			"note" => "required|nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.language');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['show_details'] = isset($temp['show_details']);
		$temp['language'] = htmlspecialchars($temp['language']??null);
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
