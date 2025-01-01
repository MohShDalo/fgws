<?php

namespace App\Http\Requests\Store;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePortfolioRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('create', Portfolio::class);
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
			"release_date" => "required|nullable|date",
			"link" => "required|nullable|string|min:0|max:255",
			"categry" => "required|nullable|string|min:0|max:255|in:value1,value2",
			"mockup_image" => "required|nullable|string|min:0|max:255",
			"file" => "required|nullable|string|min:0|max:255",
			"note" => "required|nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.portfolio');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['title'] = htmlspecialchars($temp['title']??null);
		$temp['link'] = htmlspecialchars($temp['link']??null);
		$temp['categry'] = htmlspecialchars($temp['categry']??null);
		$temp['mockup_image'] = htmlspecialchars($temp['mockup_image']??null);
		$temp['file'] = htmlspecialchars($temp['file']??null);
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
