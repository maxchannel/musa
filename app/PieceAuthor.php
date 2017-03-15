<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceAuthor extends Model 
{
	protected $fillable = ['author_id', 'piece_id'];
}
