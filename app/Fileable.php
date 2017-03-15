<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileable extends Model 
{
	protected $fillable = ['file_id', 'fileable_id', 'fileable_type'];

}
