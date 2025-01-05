<?php

namespace App\Http\Requests\Update;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCommentRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return false;//Gate::allows('update', $this->comment);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			// "content" => "required|nullable|string|min:0|max:255",
			// "created_by_id" => "nullable|exists:users,id",
			// "post_id" => "nullable|exists:posts,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.comment');
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
