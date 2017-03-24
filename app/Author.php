<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['name'];
	
    public function pieces()
    {
       return $this->belongsToMany('App\Piece', 'piece_authors','author_id', 'piece_id')->withPivot('id','deleted_at');
    }
}
