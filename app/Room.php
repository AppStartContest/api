<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Room extends Model
{
	use SoftDeletes;
	protected $fillable = ['name'];

	public function users(){
		return $this->belongsToMany('App\User');
	}


	public function expenses(){
		return $this->hasMany('App\Expense');
	}


	public function events(){
		return $this->hasMany('App\Event');
	}


	public function messages(){
		return $this->hasMany('App\Message');
	}

	// scopes

    public function scopeWithExpensesOfUser($query, $userPhone){
	    return $query->with(['expenses' => function($query) use ($userPhone) {
	        $query->where('user_phone', $userPhone);
        }]);
    }

    public function scopeWithAll($query){
        return $query->with('users', 'expenses', 'events', 'messages');
    }
}