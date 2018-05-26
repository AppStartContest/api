<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model
{
    public $incrementing = false;

	use SoftDeletes;
	protected $fillable = ['phone', 'name'];

	public function rooms(){
		return $this->belongsToMany('App\Room');
	}


	public function expenses(){
		return $this->hasMany('App\Expense');
	}

	public function concerningExpenses(){
	    return $this->belongsToMany('App\Expense');
    }


	public function messages(){
		return $this->hasMany('App\messages');
	}


	// scopes

    public function scopeWithExpensesInRoom($query, $roomId){
        return $query->with(['expenses' => function ($query) use ($roomId){
            $query->where('room_id', $roomId);
        }]);
    }

    public function scopeWithAll($query){
        return $query->with('rooms', 'expenses', 'concerningExpenses', 'messages');
    }
}