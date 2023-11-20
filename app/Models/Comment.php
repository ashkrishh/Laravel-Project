<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $with = ['user', 'post'];
    protected $fillable = [
        'post_id',
        'user_id',
        'content'
    ];

     /**
     * Comment - Post relationship
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

        /**
     * Comment - User relationship
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
