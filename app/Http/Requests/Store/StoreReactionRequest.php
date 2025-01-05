<?php

namespace App\Http\Requests\Store;

use App\Models\Reaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreReactionRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Reaction::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"type" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.reaction.type')))."",
			// "created_by_id" => "nullable|exists:users,id",
			"post_id" => "required|exists:posts,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.reaction');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		// $temp['type'] = htmlspecialchars($temp['type']??null);
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
