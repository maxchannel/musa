<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagable extends Model 
{
	protected $fillable = ['image_id', 'imagable_id', 'imagable_type'];

}
