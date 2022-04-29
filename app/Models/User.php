<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tanker;
use App\Models\Feed;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use HasRoles;

   
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];

    public function tanker()
    {
        return $this->hasOne(Tanker::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class); 
    }




}//end of controller
