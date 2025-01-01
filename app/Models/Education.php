<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='educations';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'title',
		'score',
		'show_score',
		'start_date',
		'end_date',
		'organizer',
		'category',
		'special_rank',
		'note',
		'freelancer_id', /* relation 1-M */
	];
	protected $attributes = [
		'title'=>null,
		'score'=>null,
		'show_score'=>false,
		'start_date'=>null,
		'end_date'=>null,
		'organizer'=>null,
		'category'=>null,
		'special_rank'=>null,
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

	public function getShowScoreTextAttribute ()
	{
		return __('values.education.show_score')[$this->show_score]??'-';
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
		return __('values.education.category')[$this->category]??'-';
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
