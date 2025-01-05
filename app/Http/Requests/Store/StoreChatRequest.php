<?php

namespace App\Http\Requests\Store;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreChatRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Chat::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			// "title" => "required|nullable|string|min:0|max:255",
			// "first_member_id" => "nullable|exists:users,id",
			"second_member_id" => "required|exists:users,id",
			// "created_by_id" => "nullable|exists:users,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.chat');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
        $user = \Auth::check()?\Auth::user():null;
        $other = User::find(request('second_member_id'));
        $temp['title'] = 'Chat '.($user?->name??null).', '.($other?->name??null);
        $temp['first_member_id'] = $user->id;
        $temp['created_by_id'] = $user->id;
		return $temp;
	}

	public function messages()
	{
		return [
			//"attribute.validation" => "Custom Message",
		];
	}
}
