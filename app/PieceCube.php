<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceCube extends Model 
{
	protected $fillable = ['piece_id', 'type', 'height', 'width', 'long'];

}
