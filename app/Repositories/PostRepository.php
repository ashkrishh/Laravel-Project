<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Carbon;

class PostRepository
{
    protected $post;

    /**
     * __construct
     *
     * @param  mixed $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    /**
     * save post data
     *
     * @param  mixed $data
     * @return void
     */
    public function save($data)
    {
        return $this->post->create($data);
    }

     /**
     * update resource
     *
     * @param  mixed $data
     * @param  mixed $post
     * @return void
     */
    public function update($data, Post $post)
    {
        $post->update($data);
    }


    /**
     * getAllPosts - get all posts
     *
     * @return object
     */
    public function getAllPosts()
    {
        return $this->post->latest();
    }

    /**
     * Get all posts of the specified user
     *
     * @param  mixed $userIds
     * @return void
     */
    public function getUserPosts($userIds)
    {
        return $this->post->whereIn('user_id', $userIds)->latest();
    }

    /**
     * Returns count of all posts
     *
     * @return int
     */
    public function count()
    {
        return $this->post->count();
    }
    
    /**
     * getComments for a post
     *
     * @param  mixed $postId
     * @return void
     */
    public function getComments($postId)
    {
        return Comment::where('post_id', $postId)->get();
    }

     /**
     * Filters posts based on the search value
     *
     * @param  mixed $query
     * @param  mixed $search
     * @return void
     */
    public function filterBySearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
    }

     /**
     * Filters posts based on the field value
     *
     * @param  mixed $query
     * @param  mixed $type
     * @param  mixed $value
     * @return void
     */
    public function filterPostsByFields($query, $type, $value)
    {
        return $query->where($type, '=' , $value);
    }

         /**
     * Filters posts based on the date value
     *
     * @param  mixed $query
     * @param  mixed $type
     * @param  mixed $value
     * @return void
     */
    public function filterPostsByDate($query, $type, $op, $value)
    {
        return $query->whereDate($type, $op , $value);

    }

}