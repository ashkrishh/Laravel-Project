
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
            'add_comment' => 'rest/api/3/issue/{issueKey}/comment'

        ],
       
    ],
    
];
