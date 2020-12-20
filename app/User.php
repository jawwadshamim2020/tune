<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the logs for the Users.
     */
    public function logs()
    {
        return $this->hasMany(Log::class,'users_id');
    }


    function getAllUsersWithLogs(){
        return \DB::select("
        SELECT * FROM (
        SELECT u.name,u.avatar,u.occupation, 
        (SELECT GROUP_CONCAT(revenue)FROM LOGS WHERE user_id = u.id AND TYPE ='conversion') AS revenue,
        (SELECT SUM(revenue) FROM LOGS WHERE TYPE ='impression' AND user_id = u.id ) AS totalImpressions,
        (SELECT SUM(revenue) FROM LOGS WHERE user_id = u.id AND TYPE ='conversion') AS totalConversions,
        (SELECT MIN(TIME) FROM LOGS WHERE user_id = u.id ) AS minTime,
        (SELECT MAX(TIME) FROM LOGS WHERE user_id = u.id ) AS maxTime
         FROM users u  
         )q ");

    }
}
