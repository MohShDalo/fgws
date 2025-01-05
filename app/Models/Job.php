<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='jobs';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'content',
		'needed_postion',
		'max_price',
		'max_time',
		'expected_start_date',
		'worker_id', /* relation 1-M */
		'owner_id', /* relation 1-M */
	];
	protected $attributes = [
		'content'=>null,
		'needed_postion'=>null,
		'max_price'=>0,
		'max_time'=>0,
		'expected_start_date'=>null,
		'worker_id' => null, /* relation 1-M */
		'owner_id' => null, /* relation 1-M */
	];
	protected $casts = [
		'deleted_at'=>'datetime',
		'created_at'=>'datetime',
		'updated_at'=>'datetime',
		'expected_start_date'=>'datetime',
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

	public function getExpectedStartDateFormatedAttribute ()
	{
		return $this->expected_start_date->format('Y-m-d')??'-';
	}

	public function offers()
	{
		return $this->hasMany(Offer::class,'job_id','id');
	}
	//No Readable Get method for relation [Job - job | offers - Offer]

	public function worker()
	{
		return $this->belongsTo(Freelancer::class,'worker_id','id');
	}
	public function getWorkerNameAttribute()
	{
		return $this->worker?->name??null;
	}

	public function owner()
	{
		return $this->belongsTo(Manger::class,'owner_id','id');
	}
	public function getOwnerNameAttribute()
	{
		return $this->owner?->name??null;
	}
	public function getOwnerCompanyNameAttribute()
	{
		return $this->owner?->company_name??null;
	}

	public function delete(){
		$this->offers()->delete();
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
