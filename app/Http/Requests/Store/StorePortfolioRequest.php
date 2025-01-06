<?php

namespace App\Http\Requests\Store;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePortfolioRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return Gate::allows('create', Portfolio::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"title" => "required|string|min:0|max:255",
			"release_date" => "nullable|date",
			"link" => "required_with:release_date|nullable|string|min:0|max:255",
			"category" => "required|string|min:0|max:255|in:".implode(',',array_keys(__('values.portfolio.category')))."",
			"mockup_image" => "nullable|file|min:0|max:4096",
			"file" => "nullable|file|min:0|max:4096",
			"note" => "nullable|string|min:0|max:1000",
			// "freelancer_id" => "nullable|exists:freelancers,id",
		];
	}
	public function attributes(): array
	{
		return  __('caption.cms.fields.portfolio');
	}

	public function validated($key=null, $default=null){
		$temp = parent::validated();
		$temp['title'] = htmlspecialchars($temp['title']??null);
		$temp['link'] = htmlspecialchars($temp['link']??null);
		$temp['category'] = htmlspecialchars($temp['category']??null);
		$temp['note'] = htmlspecialchars($temp['note']??null);
        $temp['freelancer_id'] = \Auth::check()?\Auth::user()->roleable_id:null;
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
