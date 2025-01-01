<?php

namespace App\Http\Requests\Update;

use App\Models\Reference;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateReferenceRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->reference);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"full_name" => "required|nullable|string|min:0|max:255",
			"contact_number" => "required|nullable|string|min:0|max:255",
			"email" => "required|nullable|string|min:0|max:255",
			"postion" => "required|nullable|string|min:0|max:255",
			"note" => "required|nullable|string|min:0|max:255",
			"freelancer_id" => "nullable|exists:freelancers,id",
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
