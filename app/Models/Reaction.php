<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='reactions';
	public $incrementing = true;
	public $timestamps = true;
    public const TYPE_LIKE = 1;
    public const TYPE_HEART = 2;
    public const TYPE_LOVE = 3;
	protected $fillable =[
		'type',
		'created_by_id', /* relation 1-M */
		'post_id', /* relation 1-M */
	];
	protected $attributes = [
		'type'=>null,
		'created_by_id' => null, /* relation 1-M */
		'post_id' => null, /* relation 1-M */
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

	public function getTypeTextAttribute ()
	{
		return __('values.reaction.type')[$this->type]??'-';
	}

	public function created_by()
	{
		return $this->belongsTo(User::class,'created_by_id','id');
	}
	public function getCreatedByNameAttribute()
	{
		return $this->created_by?->name??null;
	}

	public function post()
	{
		return $this->belongsTo(Post::class,'post_id','id');
	}
	public function getPostContentAttribute()
	{
		return $this->post?->content??null;
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
