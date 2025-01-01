<?php

namespace App\Http\Requests\Update;

use App\Models\Certificate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCertificateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->certificate);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"course_title" => "required|nullable|string|min:0|max:255",
			"hours" => "required|nullable|string|min:0|max:255",
			"start_date" => "required|nullable|date",
			"end_date" => "required|nullable|date",
			"organizer" => "required|nullable|string|min:0|max:255",
			"category" => "required|nullable|string|min:0|max:255|in:value1,value2",
			"file" => "required|nullable|string|min:0|max:255",
			"show" => "nullable|string|min:0|max:255",
			"note" => "required|nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.certificate');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['show'] = isset($temp['show']);
		$temp['course_title'] = htmlspecialchars($temp['course_title']??null);
		$temp['hours'] = htmlspecialchars($temp['hours']??null);
		$temp['organizer'] = htmlspecialchars($temp['organizer']??null);
		$temp['category'] = htmlspecialchars($temp['category']??null);
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
