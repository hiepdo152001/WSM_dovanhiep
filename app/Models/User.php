<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

            
            'email',
            'name',
            'password',
            'department',
            'position',
            'phone',
            'age',
            'project',
            'sex',
            'permanent_address',
            'seniority',
            'working_day',
            'promotion_day',
            'contract',
            'temporary_address',
            'CCCD',
            'date_range',
            'issued_by',
            'personal_email',
            'tax_code',
            'leave_days',
            'use_property',
            'avatar'
           
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function contact(){
        return $this->hasMany(contact::class,'user_id','id');
    }
    public function timeKeep(){
        return $this->hasMany(time_keep::class,'user_id','id');
    }
}
