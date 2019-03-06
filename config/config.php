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
    'path' => app_path(DIRECTORY_SEPARATOR.'Console'.DIRECTORY_SEPARATOR.'Playbooks'),

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
    | Playbook Local
    |--------------------------------------------------------------------------
    |
    | Is it only possible to run playbooks on your development environment.
    |
    */
    'local' => true,
];
