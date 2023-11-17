<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class PostService
{
    protected $postRepository;

    /**
     * __construct
     *
     * @param  mixed $postRepository
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Save post data
     * Store to DB if there are no errors.
     * @param  mixed $request
     * @return bool
     */
    public function savePost($request)
    {
        try {
            $this->postRepository->save($this->getDataForSavePost($request));
            return true;
        } catch (Exception $e) {
            Log::error('Error while saving post : ' . $e->getMessage());
            return false;
        }
    }

    /**
     * getDataForSavePost - get data for saving the post
     *
     * @param  mixed $request
     * @return array
     */
    public function getDataForSavePost($request)
    {

        $attributes = $request->except(['_token', '_method']);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['publish_date'] = Carbon::createFromFormat('d/m/Y',$request->publish_date)->format('Y/m/d');
        if ($request->file('image')) {
            $attributes['image'] = $this->savePostImage($request);
        }

        return $attributes;
    }

      /**
     * savePostImage - Save post image
     *
     * @param  mixed $request
     * @return void
     */
    public function savePostImage($request)
    {
        return $request->file('image')->store('posts');
    }
    
    /**
     * get the lists of posts
     *
     * @return void
     */
    public function getAllPosts()
    {
        return $this->postRepository->getAllPosts();
    }
   
}