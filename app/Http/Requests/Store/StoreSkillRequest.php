<?php

namespace App\Http\Requests\Store;

use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreSkillRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('create', Skill::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"title" => "required|nullable|string|min:0|max:255",
			"category" => "required|nullable|string|min:0|max:255|in:value1,value2",
			"show" => "nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.skill');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['show'] = isset($temp['show']);
		$temp['title'] = htmlspecialchars($temp['title']??null);
		$temp['category'] = htmlspecialchars($temp['category']??null);
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
