<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Message extends Model
{
	use SoftDeletes;
	protected $fillable = ['user_phone', 'expense_id', 'event_id', 'room_id', 'content'];

	public function user(){
	    return $this->belongsTo('App\User');
    }

}