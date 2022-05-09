<?php

namespace App\Models;

use App\Observers\AccessedObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessed extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'uuid';

    protected $table = 'accessed';

    protected $fillable = ['visitor', 'date', 'updated_at'];

}
