<?php

namespace Scaling\Playbook;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Playbook
{
    /**
     * Run the playbook.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     */
    abstract public function run(InputInterface $input, OutputInterface $output): void;

    /**
     * Run the playbook x amount of times.
     *
     * @param int $times
     * @return \Scaling\Playbook\PlaybookDefenition
     */
    public static function times(int $times): PlaybookDefenition
    {
        return PlaybookDefenition::times(static::class, $times);
    }

    /**
     * Only run the playbook once.
     *
     * @return \Scaling\Playbook\PlaybookDefenition
     */
    public static function once(): PlaybookDefenition
    {
        return PlaybookDefenition::once(static::class);
    }

    /**
     * Let the playbook know that it has run.
     */
    public function finished(): void
    {
        //
    }

    /**
     * List of playbooks that have to run before this playbook.
     *
     * @return array
     */
    public function before(): array
    {
        return [];
    }

    /**
     * List of playbooks that have to run after this playbook.
     *
     * @return array
     */
    public function after(): array
    {
        return [];
    }
}
