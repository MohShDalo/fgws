<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='chats';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'title',
		'first_member_id', /* relation 1-M */
		'second_member_id', /* relation 1-M */
		'created_by_id', /* relation 1-M */
	];
	protected $attributes = [
		'title'=>null,
		'first_member_id' => null, /* relation 1-M */
		'second_member_id' => null, /* relation 1-M */
		'created_by_id' => null, /* relation 1-M */
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


	public function messages()
	{
		return $this->hasMany(Message::class,'chat_id','id');
	}
	//No Readable Get method for relation [Chat - chat | messages - Message]

	public function first_member()
	{
		return $this->belongsTo(User::class,'first_member_id','id');
	}
	public function getFirstMemberNameAttribute()
	{
		return $this->first_member?->name??null;
	}

	public function second_member()
	{
		return $this->belongsTo(User::class,'second_member_id','id');
	}
	public function getSecondMemberNameAttribute()
	{
		return $this->second_member?->name??null;
	}

	public function created_by()
	{
		return $this->belongsTo(User::class,'created_by_id','id');
	}
	public function getCreatedByNameAttribute()
	{
		return $this->created_by?->name??null;
	}

	public function delete(){
		$this->messages()->delete();
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
