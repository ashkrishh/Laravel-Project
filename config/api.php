
<?php

return [

    'jira' => [
        'credential' => [
            'base_url' => ENV('JIRA_BASE_URL'),
            'username' => ENV('JIRA_API_USERNAME'),
            'token' => ENV('JIRA_API_TOKEN'),
            'project_key' => ENV('JIRA_PROJECT_KEY'),
        ],
        'endpoint' => [
            'create_issue' => 'rest/api/3/issue/',
            'add_comment' => 'rest/api/3/issue/{issueKey}/comment',
            'update_transition' => 'rest/api/3/issue/{issueKey}/transitions',
        ],
        'transition' => [
            'start' => 81,
            'resolved' => 121,
        ],
        'issue_type' => [
            'task' => 10001,
        ],
        'priority' => [
            'highest' => '1',
            'high' => '2',
            'medium' => '3',
            'low' => '4',
            'lowest' => '5',
        ]
       
    ],
    
];
