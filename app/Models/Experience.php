<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='experiences';
	public $incrementing = true;
	public $timestamps = true;
    public const CATEGORY_LIFESTYLE = 'life-style';
    public const CATEGORY_TECHNICAL = 'technical';
	protected $fillable =[
		'postion',
		'company_name',
		'company_address',
		'start_date',
		'end_date',
		'category',
		'note',
		'freelancer_id', /* relation 1-M */
	];
	protected $attributes = [
		'postion'=>null,
		'company_name'=>null,
		'company_address'=>null,
		'start_date'=>null,
		'end_date'=>null,
		'category'=>null,
		'note'=>null,
		'freelancer_id' => null, /* relation 1-M */
	];
	protected $casts = [
		'deleted_at'=>'datetime',
		'created_at'=>'datetime',
		'updated_at'=>'datetime',
		'start_date'=>'datetime',
		'end_date'=>'datetime',
	];

	protected static function boot()
	{
		parent::boot();
		// static::created(function ($model){
		// });
		// static::saving(function ($model){
		// });
		// static::saved(function ($model){
		// });
		// static::deleted(function ($model){
		// });
	}

	public function getHtmlTextAttribute ()
	{
        return "$this->postion";
	}
	public function getCategoryTextAttribute ()
	{
		return __('values.experience.category')[$this->category]??'-';
	}
	public function getStartDateFormatedAttribute ()
	{
		return $this->start_date->format('Y-m-d')??'-';
	}
	public function getEndDateFormatedAttribute ()
	{
		return $this->end_date?->format('Y-m-d')??'-';
	}

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class,'freelancer_id','id');
	}
	public function getFreelancerNameAttribute()
	{
		return $this->freelancer?->name??null;
	}

	public function delete(){
		parent::delete();
	}

	public static function filterModelsData($data, $attribute, $value){
		if(str_contains($attribute,'name')||str_contains($attribute,'title')){
			return $data->where($attribute,'LIKE',"%$value%");
		}else{
			return $data->where($attribute,$value);
		}
	}
}
