<?php

namespace App\Http\Requests\Store;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLanguageRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Language::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"language" => "required|string|min:0|max:255",
			"category" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.language.category')))."",
			"general_score" => "required|integer|min:0|max:100",
			"speaking_score" => "required_with:show_details|integer|min:0|max:100",
			"writing_score" => "required_with:show_details|integer|min:0|max:100",
			"listening_score" => "required_with:show_details|integer|min:0|max:100",
			"show_details" => "nullable|string|min:0|max:255",
			"note" => "nullable|string|min:0|max:255",
			// "freelancer_id" => "nullable|exists:freelancers,id",
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
		// $temp['category'] = htmlspecialchars($temp['category']??null);
		$temp['note'] = htmlspecialchars($temp['note']??null);
        $temp['freelancer_id'] = \Auth::check()?\Auth::user()->roleable_id:null;
		return $temp;
	}

	public function messages()
	{
		return [
			//"attribute.validation" => "Custom Message",
		];
	}
}
