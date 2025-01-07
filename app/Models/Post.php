<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	use HasFactory, SoftDeletes;
	protected $table ='posts';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable =[
		'content',
		'image',
		'owner_id', /* relation 1-M */
	];
	protected $attributes = [
		'content'=>null,
		'image'=>null,
		'owner_id' => null, /* relation 1-M */
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

	public function getImageHtmlAttribute ()
    {
        $path = "'".asset('img/no-image.jpeg')."'";
        return $this->image? "<img style='height: 100px;' src='$this->image' alt='' loading='lazy' onerror=this.onerror=null;this.src=$path; > ":'--';
    }
	public function getBreifContentAttribute()
	{
        if(strlen($this->content)>=50){
            return substr($this->content, 0, 50).'...';
        }else{
            return $this->content;
        }
	}

	public function comments()
	{
		return $this->hasMany(Comment::class,'post_id','id');
	}
	//No Readable Get method for relation [Post - post | comments - Comment]

	public function reactions()
	{
		return $this->hasMany(Reaction::class,'post_id','id');
	}
	//No Readable Get method for relation [Post - post | reactions - Reaction]

	public function owner()
	{
		return $this->belongsTo(Freelancer::class,'owner_id','id');
	}
	public function getOwnerNameAttribute()
	{
		return $this->owner?->name??null;
	}

	public function delete(){
		$this->comments()->delete();
		$this->reactions()->delete();
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
