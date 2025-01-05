<?php

namespace App\Http\Requests\Store;

use App\Models\Message;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreMessageRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Message::class);
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
			// "created_by_id" => "nullable|exists:users,id",
			"chat_id" => "required|exists:chats,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.message');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
        $temp['created_by_id'] = \Auth::check()?\Auth::user()->id:null;
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
