<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='certificates';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'course_title',
		'hours',
		'start_date',
		'end_date',
		'organizer',
		'category',
		'file',
		'show',
		'note',
		'freelancer_id', /* relation 1-M */
	];
	protected $attributes = [
		'course_title'=>null,
		'hours'=>null,
		'start_date'=>null,
		'end_date'=>null,
		'organizer'=>null,
		'category'=>null,
		'file'=>null,
		'show'=>false,
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

	public function getStartDateFormatedAttribute ()
	{
		return $this->start_date->format('Y-m-d')??'-';
	}
	public function getEndDateFormatedAttribute ()
	{
		return $this->end_date->format('Y-m-d')??'-';
	}
	public function getCategoryTextAttribute ()
	{
		return __('values.certificate.category')[$this->category]??'-';
	}
	public function getShowTextAttribute ()
	{
		return __('values.certificate.show')[$this->show]??'-';
	}

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class,'freelancer_id','id');
	}
	public function getFreelancerIdAttribute()
	{
		return $this->freelancer?->id??null;
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
