<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdfable extends Model 
{
	protected $fillable = ['p_d_f_id', 'pdfable_id', 'pdfable_type'];

}
