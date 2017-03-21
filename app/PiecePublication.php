<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PiecePublication extends Model 
{
	use SoftDeletes;

	protected $fillable = ['publication_id', 'piece_id'];
	protected $dates = ['deleted_at'];

	public function figuresVigent() 
    {
        return $this->figures()->wherePivot('deleted_at', NULL);
    }

}
