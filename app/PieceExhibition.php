<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceExhibition extends Model
{
	use SoftDeletes;

	protected $fillable = ['exhibition_id', 'piece_id'];
	protected $dates = ['deleted_at'];

	public function exhibition()
    {
        return $this->hasOne('App\Exhibition', 'id', 'exhibition_id');
    }

    public function piece()
    {
        return $this->hasOne('App\PieceCube','id', 'piece_id');
    }

}
