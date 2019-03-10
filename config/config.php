<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Playbook Path
    |--------------------------------------------------------------------------
    |
    | This is the location where the command will search for playbooks.
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
];
