<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='messages';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'content',
		'created_by_id', /* relation 1-M */
		'chat_id', /* relation 1-M */
	];
	protected $attributes = [
		'content'=>null,
		'created_by_id' => null, /* relation 1-M */
		'chat_id' => null, /* relation 1-M */
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


	public function created_by()
	{
		return $this->belongsTo(User::class,'created_by_id','id');
	}
	public function getCreatedByNameAttribute()
	{
		return $this->created_by?->name??null;
	}

	public function chat()
	{
		return $this->belongsTo(Chat::class,'chat_id','id');
	}
	public function getChatTitleAttribute()
	{
		return $this->chat?->title??null;
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
