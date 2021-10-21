<?php 
namespace App;

use YoHang88\LetterAvatar\LetterAvatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Cashier\Billable;
//use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'assign_zip_code','token','verified','membership_type'
    ];

    protected $dates = [
    'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function name()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function properties()
    {
        return $this->hasMany('App\Property');
    }

    public function getAvatarAttribute()
    {
        return new LetterAvatar($this->first_name);
    }

    public function membership()
    {
        return $this->hasOne('App\Membership');
    }

    public function isEnterpise()
    {
        if ($this->membership_type == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function role()
    {
        return $this->hasOne('App\Membership');
    }

    public function realtor()
    {
        return $this->hasOne('App\Realtor');
    }

    public static function withoutRealtor()
    {
      return static::leftJoin(
        'realtors',
        'users.id', '!=', 'realtors.realtor_id'
      );
    }
}
