<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PDF extends Model 
{
	protected $fillable = ['name'];
	protected $table = 'p_d_fs';

}
