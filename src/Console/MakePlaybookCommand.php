<?php

namespace Scaling\Playbook\Console;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class MakePlaybookCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:playbook 
                            {name : The name of the playbook}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new playbook.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Playbook';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        return str_replace('DummyClass', $this->getNameInput(), $stub);
    }

    /**
     * Get the stub file for the playbook.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.DIRECTORY_SEPARATOR.'stubs'.DIRECTORY_SEPARATOR.'playbook.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        return config('laravel-playbook.path').$name.'.php';
    }

    /**
     * Get the full namespace for a given class, without the class name.
     *
     * @param  string $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return config('laravel-playbook.namespace');
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return sprintf('%sPlaybook', Str::studly(trim($this->argument('name'))));
    }

    /**
     * Parse the class name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        return $this->getNameInput();
    }
}
