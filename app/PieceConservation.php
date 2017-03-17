<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceConservation extends Model
{
	protected $fillable = ['state', 'piece_id'];

	public function files()
    {
        return $this->morphToMany('App\File', 'fileable');
    }
    
}
