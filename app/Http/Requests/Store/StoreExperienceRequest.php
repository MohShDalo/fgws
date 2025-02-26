<?php

namespace App\Http\Requests\Store;

use App\Models\Experience;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreExperienceRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Experience::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"postion" => "required|string|min:0|max:255",
			"company_name" => "required|string|min:0|max:255",
			"company_address" => "required|string|min:0|max:255",
			"start_date" => "required|date",
            "end_date" => "nullable|date|after:start_date",
			"category" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.experience.category')))."",
			"note" => "nullable|string|min:0|max:255",
			// "freelancer_id" => "nullable|exists:freelancers,id",
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
		// $temp['category'] = htmlspecialchars($temp['category']??null);
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
