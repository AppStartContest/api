<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Expense extends Model
{
	use SoftDeletes;
	protected $fillable = ['user_phone', 'room_id', 'user_id', 'value', 'description'];

	public function user(){
		return $this->belongsTo('App\User');
	}


	public function room(){
		return $this->belongsTo('App\Room');
	}


	public function messages(){
		return $this->hasMany('App\Message');
	}

	// scopes

    public function scopeOfUser($query, $userPhone){
        return $query->where('user_phone', $userPhone);
    }

    public function scopeOfRoom($query, $roomId){
        return $query->where('room_id', $roomId);
    }

    public function scopeOfUserAndRoom($query, $userPhone, $roomId){
	    return $query->ofUser($userPhone)->ofRoom($roomId);
    }

    public function scopeWithAll($query){
	    return $query->with('user', 'room', 'messages');
    }
}