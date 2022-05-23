<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = ['title', 'subtitle', 'categories', 'image', 'content', 'group_id', 'status', 'spotlight', 'alias', 'times_accessed', 'initial_times_accessed'];
}
