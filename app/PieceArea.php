<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceArea extends Model 
{
	protected $fillable = ['piece_id', 'type', 'height', 'width'];

}
