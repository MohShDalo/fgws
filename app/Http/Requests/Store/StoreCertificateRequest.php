<?php

namespace App\Http\Requests\Store;

use App\Models\Certificate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCertificateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Certificate::class);
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
			"category" => "required|nullable|string|min:0|max:255|in:".implode(',',array_keys(__('values.certificate.category')))."",
			"file" => "required|nullable|string|min:0|max:255",
			"show" => "nullable|string|min:0|max:255",
			"note" => "required|nullable|string|min:0|max:255",
			// "freelancer_id" => "nullable|exists:freelancers,id",
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
