<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagable extends Model 
{
	use SoftDeletes;
	protected $table = 'imagables';
	protected $fillable = ['image_id', 'imagable_id', 'imagable_type'];
	protected $dates = ['deleted_at'];

}
