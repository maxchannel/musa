<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceIntervention extends Model 
{
	use SoftDeletes;
	
	protected $fillable = ['process', 'piece_id', 'year', 'manager'];
	protected $dates = ['deleted_at'];

	public function files()
    {
        return $this->morphToMany('App\File', 'fileable');
    }

}
