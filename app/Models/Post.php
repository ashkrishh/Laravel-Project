<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with = ['user'];
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'publish_date',
        'image',
        'in_jira',
        'status'
    ];

    /**
    * Post - User relationship
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}