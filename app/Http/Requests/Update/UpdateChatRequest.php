<?php

namespace App\Http\Requests\Update;

use App\Models\Chat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateChatRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->chat);
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
			"first_member_id" => "nullable|exists:users,id",
			"second_member_id" => "nullable|exists:users,id",
			"created_by_id" => "nullable|exists:users,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.chat');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['title'] = htmlspecialchars($temp['title']??null);
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
