<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class JiraApiService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('api.jira.credential.base_url');
        $this->apiUsername = config('api.jira.credential.username');
        $this->apiToken = config('api.jira.credential.token');
        $this->projectKey = config('api.jira.credential.project_key');
    }

    public function createTicket($data)
    {
        $fields = [
            'fields' => [
                'project' => ['key' => $this->projectKey],
                'summary' => $data->title,
                'description' => [
                    'type' =>  'doc',
                    'version' => 1,
                    'content' => [
                    [
                        'type' => 'paragraph',
                        'content' => [
                        [
                            'type' => 'text',
                            'text' => $data->content
                        ]
                        ]
                    ]
                    ]
                    ],
                'issuetype' => ['id' => '10001'],
                'priority' => ['id' => '3'],
            ]
        ];
        $responseData = $this->setApiData(config('api.jira.endpoint.create_issue'), $fields);
        return $responseData;
    }

    public function addComment($data)
    {
        $fields = [
            "body" => [
                "content" => [
                    [
                        "content" => [
                            [
                                "text" => $data->content,
                                "type" => "text"
                            ]
                        ],
                        "type" => "paragraph"
                    ]
                ],
                "type" => "doc",
                "version" => 1
            ]
        ];
        
        $responseData = $this->setApiData(str_replace('{issueKey}', $data->issueKey, config('api.jira.endpoint.add_comment')), $fields);
        return $responseData;
    }

    public function setApiData($endpoint, $fields = [])
    {
        try {
            $response = $this->client->post($this->baseUrl . $endpoint, [
                'auth' => [$this->apiUsername, $this->apiToken],
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' =>  $fields,
               
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            Log::info("API error => " . $e->getResponse()->getBody()->getContents());
            throw $e;
        }
    }

    public function getApiData($endpoint, $params = [], $fields = [])
    {
        $response = $this->client->get($this->baseUrl . $endpoint, [
            'auth' => [$this->apiUsername, $this->apiToken],
            'query' => $params,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => [
                'fields' => $fields,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }


}
