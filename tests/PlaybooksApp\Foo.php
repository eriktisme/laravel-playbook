<?php

namespace \Scaling\Playbook\Tests\Playbooks;

use Scaling\Playbook\Playbook;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Foo extends Playbook
{
    /**
     * Run the playbook.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     */
    public function run(InputInterface $input, OutputInterface $output): void
    {
        //
    }
}
