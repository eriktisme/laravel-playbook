<?php

namespace Scaling\Playbook\Console;

use Illuminate\Support\Str;
use Scaling\Playbook\Playbook;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Console\ConfirmableTrait;
use Scaling\Playbook\PlaybookDefenition;

class PlaybookCommand extends Command
{
    use ConfirmableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'playbook:run 
                            {playbook? : The name of the playbook you want to run};
                            {--force : Force the operation to run when in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a predefined playbook to fill your application.';

    /**
     * List of definitions that has been run.
     *
     * @var array
     */
    private $ranDefenitions = [];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! $this->confirmToProceed()) {
            return;
        }

        if (is_null($name = $this->argument('playbook'))) {
            $name = $this->askWhichBook($this->getAvailablePlaybooks());
        }

        $this->call('migrate:refresh');

        $this->runPlaybook($this->resolvePlaybook($name));
    }

    /**
     * Run the selected playbook.
     *
     * @param \Scaling\Playbook\PlaybookDefenition $definition
     * @return void
     */
    private function runPlaybook(PlaybookDefenition $definition): void
    {
        foreach ($definition->playbook->before() as $book) {
            $this->runPlaybook($this->resolvePlaybook($book));
        }

        for ($i = 1; $i <= $definition->times; $i++) {
            if ($definition->once && $this->definitionHasRun($definition)) {
                continue;
            }

            $name = get_class($definition->playbook);

            $this->info("Running playbook `{$name}` (#{$i})");

            $definition->playbook->run($this->input, $this->output);
            $definition->playbook->finished();

            $this->ranDefenitions[$definition->id] = ($this->ranDefenitions[$definition->id] ?? 0) + 1;
        }

        foreach ($definition->playbook->after() as $book) {
            $this->runPlaybook($this->resolvePlaybook($book));
        }
    }

    /**
     * Get a list of available playbooks.
     *
     * @return array
     */
    private function getAvailablePlaybooks(): array
    {
        $files = scandir(config('laravel-playbook.path'));

        unset($files[0], $files[1]);

        return Collection::make($files)
            ->map(function ($fileName) {
                return str_replace('.php', '', $fileName);
            })
            ->filter(function ($fileName) {
                return $fileName !== '.DS_Store';
            })
            ->values()->toArray();
    }

    /**
     * Ask which playbook the developer wants to run.
     *
     * @param array $available
     * @return string
     */
    private function askWhichBook(array $available): string
    {
        return $this->choice('Please choose a playbook', $available);
    }

    /**
     * Resolve the definition for the given playbook.
     *
     * @param Scaling\Playbook\Playbook|Scaling\Playbook\PlaybookDefinition|string $class
     * @return \Scaling\Playbook\PlaybookDefenition
     */
    private function resolvePlaybook($class): PlaybookDefenition
    {
        if ($class instanceof PlaybookDefenition) {
            return $class;
        }

        if ($class instanceof Playbook) {
            return new PlaybookDefenition(get_class($class));
        }

        $namespace = config('laravel-playbook.namespace');

        if (! Str::startsWith($class, [$namespace, "\\{$namespace}"])) {
            $class = "{$namespace}\\{$class}";
        }

        return new PlaybookDefenition($class);
    }

    /**
     * Determine if the given definition has ran before.
     *
     * @param \Scaling\Playbook\PlaybookDefenition $definition
     * @return bool
     */
    private function definitionHasRun(PlaybookDefenition $definition): bool
    {
        return isset($this->ranDefenitions[$definition->id]);
    }
}
