<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='portfolios';
	public $incrementing = true;
	public $timestamps = true;
    public const CATEGORY_LIFESTYLE = 'life-style';
    public const CATEGORY_TECHNICAL = 'technical';
	protected $fillable =[
		'title',
		'release_date',
		'link',
		'category',
		'mockup_image',
		'file',
		'note',
		'freelancer_id', /* relation 1-M */
	];
	protected $attributes = [
		'title'=>null,
		'release_date'=>null,
		'link'=>null,
		'category'=>null,
		'mockup_image'=>null,
		'file'=>null,
		'note'=>null,
		'freelancer_id' => null, /* relation 1-M */
	];
	protected $casts = [
		'deleted_at'=>'datetime',
		'created_at'=>'datetime',
		'updated_at'=>'datetime',
		'release_date'=>'datetime',
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
        return "$this->title";
	}
	public function getReleaseDateFormatedAttribute ()
	{
		return $this->release_date?->format('Y-m-d')??'-';
	}
	public function getcategoryTextAttribute ()
	{
		return __('values.portfolio.category')[$this->category]??'-';
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
