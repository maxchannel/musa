<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceExhibition extends Model
{
	protected $fillable = ['exhibition_id', 'piece_id'];

	public function exhibition()
    {
        return $this->hasOne('App\Exhibition', 'id', 'exhibition_id');
    }

    public function piece()
    {
        return $this->hasOne('App\PieceCube','id', 'piece_id');
    }

}
