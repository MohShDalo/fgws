<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='offers';
	public $incrementing = true;
	public $timestamps = true;

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

	protected $fillable =[
		'content',
		'price',
		'time',
		'status',
		'status_reason',
		'owner_id', /* relation 1-M */
		'job_id', /* relation 1-M */
	];
	protected $attributes = [
		'content'=>null,
		'price'=>0,
		'time'=>0,
		'status'=>null,
		'status_reason'=>null,
		'owner_id' => null, /* relation 1-M */
		'job_id' => null, /* relation 1-M */
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

	public function getStatusTextAttribute ()
	{
		return __('values.offer.status')[$this->status]??'-';
	}

	public function owner()
	{
		return $this->belongsTo(Freelancer::class,'owner_id','id');
	}
	public function getOwnerNameAttribute()
	{
		return $this->owner?->name??null;
	}

	public function job()
	{
		return $this->belongsTo(Job::class,'job_id','id');
	}
	public function getJobContentAttribute()
	{
		return $this->job?->content??null;
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
