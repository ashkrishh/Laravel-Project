<?php

namespace App\Services;

use App\Models\Post;
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
     * Get total count of posts
     *
     * @return int
     */
    public function getPostsCount()
    {
        return $this->postRepository->count();
    }

    /**
     * getPostsCountWithFilter - Get count of posts with filter
     *
     * @param  mixed $filter
     * @return int
     */
    public function getPostsCountWithFilter($filter)
    {
        return $this->filterPosts($filter)->count();
    }

    /**
     * Get all posts based on filters if any
     *
     * @param  mixed $request
     * @return void
     */
    public function getAllPosts($request)
    {
        $offset = $request->get("start") ?? 0;
        $limit = $request->get("length")?? 10;
        $posts = array();
        try {
            $posts = $this->filterPosts($request['filter'])->skip($offset)->take($limit)->get();
        } catch (Exception $e) {
            Log::error('Error while getting posts : ' . $e->getMessage());
        }
        
        return $posts;
    }

    /**
     * Format the list of posts in datatable format
     *
     * @param  mixed $posts
     * @return array
     */
    public function formatPostList($posts)
    {
        $dataArray = array();
        if (!$posts) {
            return $dataArray;
        }
        foreach ($posts as $key=>$post) {
            
            $actions = $this->getActionButtons($post);
            $title = '<a href='."/posts/".$post->id.'>'.$post->title.'</a>';
            $dataArray[] = array(
              "no" => $key+1,
              "title" => $title,
              "content" => $post->content,
              "publish_date" => $post->publish_date,
              "author" => $post->user->name,
              "comments" => 5,
              "actions" => $actions,
            );
        }
        return $dataArray;
    }

     /**
     * Get action buttons for each posts
     *
     * @param  mixed $post
     * @return void
     */
    public function getActionButtons($post)
    {
        $url = url('/posts/'.$post->id);
        
        $actions = '<button class="btn btn-sm btn-primary mb-1" type="button"> Edit</button>'
            .'<form id="delete-post" action="'.$url.'" method="POST">'
            . csrf_field()
            . '<input type="hidden" name="_method" value="DELETE">' 
            . '<button class="btn btn-sm btn-primary" type="submit">Delete</button>'
            . '</form>';
           
        return $actions;
    }

    /**
     * Filter posts
     *
     * @param  mixed $filter
     * @return void
     */
    public function filterPosts($filter)
    {
        $posts = $this->postRepository->getAllPosts();
        
        if (isset($filter['search'])) {
            $posts = $this->postRepository->filterBySearch($posts, $filter['search']);
        }
        if (isset($filter['user_id'])) {
            $posts = $this->postRepository->filterPostsByFields($posts, 'user_id', $filter['user_id']);
        }
        return $posts;
    }

}
