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
        'jira_id',
        'status'
    ];

    /**
    * Post - User relationship
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Post - comment relationship
     *
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * scopeInJira
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeInJira($query)
    {
        return $query->where('in_jira', 1);
    }

}