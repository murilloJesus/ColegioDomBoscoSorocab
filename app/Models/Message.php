<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCroppedMessageAttribute()
    {
        if( strlen($this->message) > 60 ){
            $crop = substr($this->message, 0, 60);
            return "$crop...";
        }else{
            return $this->message;
        }
    }
}
