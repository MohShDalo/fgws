<?php

namespace App\Http\Requests\Store;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCommentRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Comment::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"content" => "required|string|min:0|max:255",
			// "created_by_id" => "nullable|exists:users,id",
			"post_id" => "required|exists:posts,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.comment');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['content'] = htmlspecialchars($temp['content']??null);
        $temp['created_by_id'] = \Auth::check()?\Auth::user()->id:null;
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
