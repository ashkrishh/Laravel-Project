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
        return Post::latest();
    }

    /**
     * Get all posts of the specified user
     *
     * @param  mixed $userIds
     * @return void
     */
    public function getUserPosts($userIds)
    {
        return Post::whereIn('user_id', $userIds)->latest();
    }

}