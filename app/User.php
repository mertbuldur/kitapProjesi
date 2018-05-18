<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }

    static function getField($id,$field)
    {
        $c = User::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = User::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else
        {
            return "Silinmiş Kullanıcı";
        }
    }


}
