<?php namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Illuminate\Foundation\Auth\User as Authenticatable; 

class User extends Authenticatable
{
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

    /**
     * Your User Model content
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'responsabile'
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
}
