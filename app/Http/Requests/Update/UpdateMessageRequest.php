<?php

namespace App\Http\Requests\Update;

use App\Models\Message;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateMessageRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->message);
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
			"created_by_id" => "nullable|exists:users,id",
			"chat_id" => "nullable|exists:chats,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.message');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['content'] = htmlspecialchars($temp['content']??null);
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
