<?php

namespace App\Http\Requests\Update;

use App\Models\Offer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateOfferRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('update', $this->offer);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"content" => "required|string|min:0|max:1000",
			"price" => "required|integer|min:0|max:100000",
			"time" => "required|integer|min:0|max:100000",
			// "status" => "required|nullable|string|min:0|max:255|in:".implode(',',array_keys(__('values.offer.status')))."",
			// "status_reason" => "required|nullable|string|min:0|max:255",
			// "owner_id" => "nullable|exists:freelancers,id",
			"job_id" => "nullable|exists:jobs,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.offer');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['content'] = htmlspecialchars($temp['content']??null);
		$temp['status'] = htmlspecialchars($temp['status']??null);
		$temp['status_reason'] = htmlspecialchars($temp['status_reason']??null);
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
