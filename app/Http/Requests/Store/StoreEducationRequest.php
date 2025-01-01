<?php

namespace App\Http\Requests\Store;

use App\Models\Education;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreEducationRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('create', Education::class);
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
			"score" => "required|nullable|string|min:0|max:255",
			"show_score" => "nullable|string|min:0|max:255",
			"start_date" => "required|nullable|date",
			"end_date" => "required|nullable|date",
			"organizer" => "required|nullable|string|min:0|max:255",
			"category" => "required|nullable|string|min:0|max:255|in:value1,value2",
			"special_rank" => "required|nullable|string|min:0|max:255",
			"note" => "required|nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.education');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['show_score'] = isset($temp['show_score']);
		$temp['title'] = htmlspecialchars($temp['title']??null);
		$temp['score'] = htmlspecialchars($temp['score']??null);
		$temp['organizer'] = htmlspecialchars($temp['organizer']??null);
		$temp['category'] = htmlspecialchars($temp['category']??null);
		$temp['special_rank'] = htmlspecialchars($temp['special_rank']??null);
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
