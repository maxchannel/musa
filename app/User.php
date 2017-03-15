<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract 
{
	use Authenticatable, CanResetPassword;

	protected $table = 'users';
	protected $fillable = ['name', 'email', 'type', 'password'];
	protected $hidden = ['password', 'remember_token'];

	public function notifications()
    {
        return $this->hasMany('App\UserNotification');
    }

    public function getNotifications()
    {
        return $this->notifications()->where('v',0)->count();
    }

    public function is($type)
    {
        return $this->type === $type;
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    public function isTech()
    {
        return $this->type === 'tech';
    }

    public function isStaff()
    {
        return $this->type === 'staff';
    }

}
