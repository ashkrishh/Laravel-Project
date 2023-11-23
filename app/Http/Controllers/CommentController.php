<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\JiraApiService;
use App\Models\Post;

class CommentController extends Controller
{
    protected $jiraApiService;
    protected $postService;
    
    /**
     * __construct
     *
     * @param  mixed $jiraApiService
     * @param  mixed $post
     * @return void
     */
    public function __construct(JiraApiService $jiraApiService, Post $post)
    {
        $this->jiraApiService = $jiraApiService;
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $request->validated();
        $request['user_id'] = auth()->user()->id;
        try {
            Comment::create($request->only(['user_id', 'post_id', 'content']));
            $this->checkAndUpdateJira($request);
            
            return back()->with('success', 'Your comment has been added');
        } catch (Exception $e) {
            Log::error('Error while adding comment : ' . $e->getMessage());
            return back()->with('error', 'Could not add comment.');
        }
    }
    
    /**
     * checkAndUpdateJira - checks if this post is to be updated in jira and update accordingly
     *
     * @param  mixed $data
     * @return void
     */
    public function checkAndUpdateJira($data)
    {
        $post = $this->post->where('id', $data->post_id)->first();
        if($post->in_jira == 1) {
            $data->jira_id = $post->jira_id;
            $this->jiraApiService->addComment($data);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
