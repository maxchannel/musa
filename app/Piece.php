<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
	protected $fillable = ['title', 'year', 'elements', 'description', 'type_id', 'price', 'user_id'];

	public function cube()
    {
        return $this->hasOne('App\PieceCube');
    }

    public function areas()
    {
        return $this->hasMany('App\PieceArea');
    }

    public function type()
    {
        return $this->hasOne('App\Type', 'id', 'type_id');
    }

    public function images()
    {
        return $this->morphToMany('App\Image', 'imagable')->withPivot('id', 'created_at');
    }
    
    public function authors()
    {
       return $this->belongsToMany('App\Author', 'piece_authors','piece_id', 'author_id')->withPivot('id','deleted_at');
    }

    public function acquisition()
    {
        return $this->hasOne('App\PieceAcquisition');
    }

    public function interventions()
    {
        return $this->hasMany('App\PieceIntervention');
    }

    public function techniques()
    {
       return $this->belongsToMany('App\Technique', 'piece_techniques','piece_id', 'technique_id')->withPivot('id','deleted_at');
    }

    public function conservations()
    {
        return $this->hasMany('App\PieceConservation');
    }

    public function loans()
    {
        return $this->hasMany('App\PieceLoan');
    }

    public function vaults()
    {
        return $this->hasMany('App\PieceVault');
    }

    public function valuations()
    {
        return $this->hasMany('App\PieceValuation');
    }

    public function exhibitions()
    {
        return $this->belongsToMany('App\Exhibition', 'piece_exhibitions','piece_id', 'exhibition_id')->withPivot('id','deleted_at');
    }

    public function exhibitionsVigent() 
    {
        return $this->exhibitions()->wherePivot('deleted_at', NULL);
    }

    public function publications()
    {
       return $this->belongsToMany('App\Publication', 'piece_publications','piece_id', 'publication_id')->withPivot('id','deleted_at');
    }

    public function publicationsVigent() 
    {
        return $this->publications()->wherePivot('deleted_at', NULL);
    }

}
