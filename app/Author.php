<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['name'];
	
    public function pieces()
    {
       return $this->belongsToMany('App\Piece', 'piece_authors','piece_id', 'author_id')->withPivot('id','deleted_at');
    }
}
