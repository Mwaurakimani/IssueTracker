<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function User(){
        return $this->hasMany(User::class);
    }

    public function Issue(){
        return $this->hasMany(Issue::class);
    }
}
