<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manger extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='mangers';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'company_name',
		'company_objectives',
		'company_employees',
	];
	protected $attributes = [
		'company_name'=>null,
		'company_objectives'=>null,
		'company_employees'=>null,
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
        return $this->morphOne(User::class, 'roleable');
    }

	public function getNameAttribute()
	{
		return $this->user?->name??null;
	}

	public function jobs()
	{
		return $this->hasMany(Job::class,'owner_id','id');
	}
	//No Readable Get method for relation [Manger - owner | jobs - Job]

	public function delete(){
		$this->jobs()->delete();
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
