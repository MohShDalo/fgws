<?php

namespace App\Http\Requests\Update;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateJobRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->job);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"content" => "required|nullable|string|min:0|max:1000",
			"needed_postion" => "required|nullable|string|min:0|max:255",
			"max_price" => "required|nullable|integer|min:0|max:100000",
			"max_time" => "required|nullable|integer|min:0|max:100000",
			"expected_start_date" => "required|nullable|date",
			"worker_id" => "nullable|exists:freelancers,id",
			"owner_id" => "nullable|exists:mangers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.job');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['content'] = htmlspecialchars($temp['content']??null);
		$temp['needed_postion'] = htmlspecialchars($temp['needed_postion']??null);
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
