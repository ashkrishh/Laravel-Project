<?php

namespace App\Repositories;

use App\Models\Post;

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

}