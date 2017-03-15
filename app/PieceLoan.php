<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceLoan extends Model 
{
	protected $fillable = ['piece_id', 'institution_id', 'period', 'manager', 'acuerdo'];

	public function piece()
    {
        return $this->hasOne('App\Piece', 'id', 'piece_id');
    }

    public function institution()
    {
        return $this->hasOne('App\Institution', 'id', 'institution_id');
    }
}
