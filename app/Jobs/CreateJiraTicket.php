<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\JiraApiService;
use App\Repositories\PostRepository;


use App\Models\Post;


class CreateJiraTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post, $data)
    {
        $this->data = $data;
        $this->post = $post;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $jiraApiService = new JiraApiService;
        $response = $jiraApiService->createTicket($this->data);
        //Log::info($response);
        $this->updatePostWithJiraResponse($response, $this->post);
    }

    /**
     * Update post with jira
     *
     * @param  mixed $responseData
     * @param  mixed $post
     * @return void
     */
    public function updatePostWithJiraResponse($responseData, Post $post)
    {
        $data = [];
        if (isset($responseData['key'])) {
            $data['jira_id'] = $responseData['key'];
            $postRepository = new PostRepository($post);
            $postRepository->update($data, $post);
            
        } else {
            Log::info("Unable to fetch 'key' from the response.");
        }
    }

   
}
