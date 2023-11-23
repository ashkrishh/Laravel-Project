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
        //JiraApiService::createTicket($this->data);
        $jiraApiService = new JiraApiService;
        $response = $jiraApiService->createTicket($this->data);
        //$this->updatePostWithJiraResponse($data, $post);
    }

   
}
