<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $table = 'message';

    public function Issue()
    {
        return $this->belongsTo(Issue::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
