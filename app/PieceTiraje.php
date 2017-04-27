<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceTiraje extends Model 
{
	use SoftDeletes;

	protected $fillable = ['contenido'];
	protected $dates = ['deleted_at'];

	public function piece()
    {
        return $this->hasOne('App\Piece', 'id', 'piece_id');
    }

}
