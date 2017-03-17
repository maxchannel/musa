<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceIntervention extends Model 
{
	protected $fillable = ['process', 'piece_id', 'year', 'manager'];

	public function files()
    {
        return $this->morphToMany('App\File', 'fileable');
    }

}
