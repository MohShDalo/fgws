<?php

namespace App\Http\Requests\Update;

use App\Models\Education;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateEducationRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('update', $this->education);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"title" => "required|string|min:0|max:255",
			"score" => "required|string|min:0|max:255",
			"show_score" => "nullable|string|min:0|max:255",
			"start_date" => "required|date",
			"end_date" => "nullable|date",
			"organizer" => "required|string|min:0|max:255",
			"category" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.education.category')))."",
			"special_rank" => "nullable|string|min:0|max:255",
			"note" => "nullable|string|min:0|max:255",
			// "freelancer_id" => "nullable|exists:freelancers,id",
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
		// $temp['category'] = htmlspecialchars($temp['category']??null);
		$temp['special_rank'] = htmlspecialchars($temp['special_rank']??null);
		$temp['note'] = htmlspecialchars($temp['note']??null);
        $temp['freelancer_id'] = \Auth::check()?\Auth::user()->roleable_id:null;
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
