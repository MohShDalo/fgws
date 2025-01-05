<?php

namespace App\Http\Requests\Store;

use App\Models\Reference;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreReferenceRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Reference::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"full_name" => "required|string|min:0|max:255",
			"contact_number" => "nullable|string|min:0|max:255",
			"email" => "nullable|string|min:0|max:255",
			"postion" => "nullable|string|min:0|max:255",
			"note" => "nullable|string|min:0|max:255",
			// "freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.reference');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['full_name'] = htmlspecialchars($temp['full_name']??null);
		$temp['contact_number'] = htmlspecialchars($temp['contact_number']??null);
		$temp['email'] = htmlspecialchars($temp['email']??null);
		$temp['postion'] = htmlspecialchars($temp['postion']??null);
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
