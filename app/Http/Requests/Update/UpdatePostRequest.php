<?php

namespace App\Http\Requests\Update;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePostRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return Gate::allows('update', $this->post);
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
			"image" => "required|nullable|string|min:0|max:255",
			"owner_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.post');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['content'] = htmlspecialchars($temp['content']??null);
		$temp['image'] = htmlspecialchars($temp['image']??null);
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
