<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceConservation extends Model
{
	use SoftDeletes;
	
	protected $fillable = ['state', 'piece_id'];
	protected $dates = ['deleted_at'];

	public function files()
    {
        return $this->morphToMany('App\File', 'fileable');
    }
    
}
