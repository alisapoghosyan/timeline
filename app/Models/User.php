<?php

namespace App\Models;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\{
    Builder,
    SoftDeletes,
};
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use  HasFactory ,SoftDeletes;
    protected $guarded = [];

public function attendaces(){
    return $this->hasMany(Attendance::class,'user_id','id');
}


}
