<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PostService;
use App\Services\UserService;

class PostController extends Controller
{
    protected $userService;
    protected $postService;

    /**
     * __construct
     *
     * @param  mixed $post
     * @return void
     */
    public function __construct(PostService $postService, UserService $userService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('post.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $response = $this->postService->savePost($request);
        if ($response) {
            return redirect()->back()->with('success', 'Your post has been created');
        }
        return redirect()->back()->with('error', 'Error ! Could not create the post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $response = $this->postService->updatePost($request, $post);
        if ($response) {
            return redirect()->back()->with('success', 'Your post has been updated');
        } 
        return redirect()->back()->with('error', 'Error ! Could not update the post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect('/posts')->with('success', 'Your post has been deleted !');
        } catch (exception $e) {
            Log::error('Error while deleting post : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Could not delete the post !');
        }
        
    }

    public function getAllPosts(Request $request)
    {
        $draw = $request->get('draw');
        $totalRecords = $this->postService->getPostsCount();
        $totalRecordswithFilter = $this->postService->getPostsCountWithFilter($request['filter']);
        $posts = $this->postService->getAllPosts($request);
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $this->postService->formatPostList($posts)
        );
        echo json_encode($response);
    }

    
    /**
     * Fetch all comments of a post
     *
     * @param  mixed $request
     * @return void
     */
    public function getPostComments(Request $request) 
    {
        $comments = $this->postService->getAllComments($request->postId);
        $data = view('post.comments.show', compact('comments'))->render();
        return response()->json($data);
    }
}
