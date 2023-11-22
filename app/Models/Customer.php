<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Spatie\Permission\Traits\HasRoles;




class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    protected $guard_name = 'customer';


}
