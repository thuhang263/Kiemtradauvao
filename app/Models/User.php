<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'is_active',
        'role'
    ];
    public function person() {
        return $this->hasOne(Person::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'role_users','role_id');
    }

}
