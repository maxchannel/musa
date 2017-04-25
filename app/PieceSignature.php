<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceSignature extends Model 
{
	use SoftDeletes;

	protected $fillable = ['firm', 'piece_id'];
	protected $dates = ['deleted_at'];

	public function piece()
    {
        return $this->belongsTo('App\Piece');
    }

}
