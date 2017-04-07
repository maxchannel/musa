<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceValuation extends Model 
{
	protected $fillable = ['valuation', 'currency', 'piece_id'];

}
