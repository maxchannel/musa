<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceAcquisition extends Model 
{
	protected $fillable = ['piece_id', 'forma', 'fecha', 'valuation'];

}
