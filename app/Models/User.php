<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class User extends Authenticatable
{

	use HasFactory, SoftDeletes;
	protected $table ='users';
	public $incrementing = true;
	public $timestamps = true;

    public const GENDER_MALE ='m';
    public const GENDER_FEMALE ='f';
    public const GENDER_OTHER ='o';

    public const MARITAL_STATUS_WIDOWED = 'w';
    public const MARITAL_STATUS_SINGLE = 's';
    public const MARITAL_STATUS_MARRIED = 'm';
    public const MARITAL_STATUS_DIVORCED = 'd';
    public const MARITAL_STATUS_OTHER = 'o';

    public const NATIONALITY_PAL = 'p';
    public const NATIONALITY_OTHER = 'o';

	protected $fillable =[
		'name',
		'image',
		'cover',
		'email',
		'password',
		'contact_number',
		'birth_date',
		'gender',
		'marital_status',
		'nationality',
		'city',
		'country',
		'address_details',
		'roleable_type',
		'roleable_id',
	];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

	protected $attributes = [
		'name'=>null,
		'image'=>'/img/profile-no-image.jpg',
		'cover'=>'/img/no-image.jpeg',
		'email'=>null,
		'contact_number'=>null,
		'birth_date'=>null,
		'gender'=>null,
		'marital_status'=>null,
		'nationality'=>null,
		'city'=>null,
		'country'=>null,
		'address_details'=>null,
		'roleable_type'=>null,
		'roleable_id'=>null,
	];
	protected $casts = [
		'deleted_at'=>'datetime',
		'created_at'=>'datetime',
		'updated_at'=>'datetime',
		'birth_date'=>'datetime',
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

	public function getBirthDateFormatedAttribute ()
	{
		return $this->birth_date->format('Y-m-d')??'-';
	}
	public function getGenderTextAttribute ()
	{
		return __('values.user.gender')[$this->gender]??'-';
	}
	public function getMaritalStatusTextAttribute ()
	{
		return __('values.user.marital_status')[$this->marital_status]??'-';
	}
	public function getNationalityTextAttribute ()
	{
		return __('values.user.nationality')[$this->nationality]??'-';
	}
	public function getCityTextAttribute ()
	{
		return __('values.user.city')[$this->city]??'-';
	}
	public function getCountryTextAttribute ()
	{
		return __('values.user.country')[$this->country]??'-';
	}

	public function comments()
	{
		return $this->hasMany(Comment::class,'created_by_id','id');
	}
	//No Readable Get method for relation [User - created_by | comments - Comment]

	public function reactions()
	{
		return $this->hasMany(Reaction::class,'created_by_id','id');
	}
	//No Readable Get method for relation [User - created_by | reactions - Reaction]

	public function chats_1()
	{
		return $this->hasMany(Chat::class,'first_member_id','id');
	}
	//No Readable Get method for relation [User - first_member | chats - Chat]

	public function chats_2()
	{
		return $this->hasMany(Chat::class,'second_member_id','id');
	}
	//No Readable Get method for relation [User - second_member | chats - Chat]

	public function chats()
	{
		return $this->hasMany(Chat::class,'created_by_id','id');
	}
	//No Readable Get method for relation [User - created_by | chats - Chat]

	public function messages()
	{
		return $this->hasMany(Message::class,'created_by_id','id');
	}
	//No Readable Get method for relation [User - created_by | messages - Message]


	public function roleable(): MorphTo
	{
        return $this->morphTo();
	}

    public function isFreelancer(){
		return $this->roleable_type == Freelancer::class;
	}

    public function isManger(){
		return $this->roleable_type == Manger::class;
	}

    public function getRoleTextAttribute(){
		return __('values.user.role')[$this->role_name]??'';
	}

	public function getRoleNameAttribute()
	{
        switch ($this->roleable_type){
            case Freelancer::class:
                return "agent";
            case Manger::class:
                return "kitchen";
            default:
                if($this->postion == 'Monitor'){
                    return "review";
                }else{
                    return "admin";
                }
        }
		return "admin";
	}
	//No Get method for relation [Freelancer - roleable | user - User]
	//No Readable Get method for relation [Freelancer - roleable | user - User]

	public function delete(){
		$this->comments()->delete();
		$this->reactions()->delete();
		$this->chats_1()->delete();
		$this->chats_2()->delete();
		$this->chats()->delete();
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
