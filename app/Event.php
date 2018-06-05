<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
	use SoftDeletes;
	protected $fillable = ['room_id', 'name', 'date', 'time', 'description'];

	public function messages(){
		return $this->hasMany('App\Message');
	}


	public function room(){
		return $this->belongsTo('App\Room');
	}

    public function scopeWithAll($query){
        return $query->with('messages', 'room');
    }
}