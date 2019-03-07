<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Playbook Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where the command will search for playbook. Feel free
    | to change this path to anything you like.
    |
    */
    'path' => app_path(DIRECTORY_SEPARATOR.'Console'.DIRECTORY_SEPARATOR.'Playbooks'.DIRECTORY_SEPARATOR),

    /*
    |--------------------------------------------------------------------------
    | Playbook Namespace
    |--------------------------------------------------------------------------
    |
    | This is the namespace to auto resolve the playbooks.
    |
    | Note: the namespace needs to match the path.
    |
    */
    'namespace' => 'App\\Console\\Playbooks',

    /*
    |--------------------------------------------------------------------------
    | Playbook Production
    |--------------------------------------------------------------------------
    |
    | Determine if it is possible to run playbook on your production environment.
    |
    */
    'production' => env('PLAYBOOK_PRODUCTION', false),
];
