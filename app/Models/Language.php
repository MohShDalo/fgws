<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='languages';
	public $incrementing = true;
	public $timestamps = true;
    public const CATEGORY_LIFESTYLE = 'life-style';
    public const CATEGORY_TECHNICAL = 'technical';
	protected $fillable =[
		'language',
		'category',
		'general_score',
		'speaking_score',
		'writing_score',
		'listening_score',
		'show_details',
		'note',
		'freelancer_id', /* relation 1-M */
	];
	protected $attributes = [
		'language'=>null,
		'category'=>null,
		'general_score'=>0,
		'speaking_score'=>0,
		'writing_score'=>0,
		'listening_score'=>0,
		'show_details'=>false,
		'note'=>null,
		'freelancer_id' => null, /* relation 1-M */
	];
	protected $casts = [
		'deleted_at'=>'datetime',
		'created_at'=>'datetime',
		'updated_at'=>'datetime',
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
        return "$this->language";
	}
	public function getCategoryTextAttribute ()
	{
		return __('values.language.category')[$this->category]??'-';
	}
	public function getShowDetailsTextAttribute ()
	{
		return __('values.language.show_details')[$this->show_details]??'-';
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
