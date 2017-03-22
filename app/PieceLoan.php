<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceLoan extends Model 
{
    use SoftDeletes;

	protected $fillable = ['piece_id', 'institution_id', 'period', 'manager', 'acuerdo', 'start', 'end'];
    protected $dates = ['deleted_at'];

	public function piece()
    {
        return $this->hasOne('App\Piece', 'id', 'piece_id');
    }

    public function institution()
    {
        return $this->hasOne('App\Institution', 'id', 'institution_id');
    }

    public function files()
    {
        return $this->morphToMany('App\File', 'fileable');
    }
}
