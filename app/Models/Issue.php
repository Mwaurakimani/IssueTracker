<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Issue extends Model
{
    use HasFactory;use SoftDeletes;

    /**
     * @var mixed
     */

    public $guarded = [];

    public function Team(){
        return $this->belongsTo(Team::class );
    }
    public function Priority(){
        return $this->belongsTo(Priority::class );
    }
    public function Level(){
        return $this->belongsTo(Level::class );
    }
    public function Status(){
        return $this->belongsTo(Status::class );
    }
    public function Group(){
        return $this->belongsTo(Group::class );
    }
    public function Type(){
        return $this->belongsTo(Type::class );
    }
    public function User(){
        return $this->belongsTo(User::class );
    }
    public function Message(){
        return $this->hasMany(Message::class );
    }

}
