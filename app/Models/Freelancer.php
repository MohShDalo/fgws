<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Freelancer extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='freelancers';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'main_career',
		'place_of_birth',
		'user_id', /* relation 1-M */
	];
	protected $attributes = [
		'main_career'=>null,
		'place_of_birth'=>null,
		'user_id' => null, /* relation 1-M */
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


	public function user()
	{
		return $this->hasOne(User::class,'roleable_id','id');
	}
	public function getUserNameAttribute()
	{
		return $this->user?->name??null;
	}

	public function skills()
	{
		return $this->hasMany(Skill::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | skills - Skill]

	public function certificates()
	{
		return $this->hasMany(Certificate::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | certificates - Certificate]

	public function educations()
	{
		return $this->hasMany(Education::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | educations - Education]

	public function languages()
	{
		return $this->hasMany(Language::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | languages - Language]

	public function experiences()
	{
		return $this->hasMany(Experience::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | experiences - Experience]

	public function portfolios()
	{
		return $this->hasMany(Portfolio::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | portfolios - Portfolio]

	public function references()
	{
		return $this->hasMany(Reference::class,'freelancer_id','id');
	}
	//No Readable Get method for relation [Freelancer - freelancer | references - Reference]

	public function posts()
	{
		return $this->hasMany(Post::class,'owner_id','id');
	}
	//No Readable Get method for relation [Freelancer - owner | posts - Post]

	public function jobs()
	{
		return $this->hasMany(Job::class,'worker_id','id');
	}
	//No Readable Get method for relation [Freelancer - worker | jobs - Job]

	public function offers()
	{
		return $this->hasMany(Offer::class,'owner_id','id');
	}
	//No Readable Get method for relation [Freelancer - owner | offers - Offer]

	public function delete(){
		$this->skills()->delete();
		$this->certificates()->delete();
		$this->educations()->delete();
		$this->languages()->delete();
		$this->experiences()->delete();
		$this->portfolios()->delete();
		$this->references()->delete();
		$this->posts()->delete();
		$this->jobs()->delete();
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
