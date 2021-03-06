<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Solution extends Model
{
    use HasFactory;use SoftDeletes;

    public function Issue(){
        return $this->hasMany(Issue::class);
    }

    public function Vote(){
        return $this->hasMany(Vote::class);
    }
}
