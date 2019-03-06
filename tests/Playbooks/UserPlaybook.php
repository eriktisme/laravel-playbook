<?php

namespace Scaling\Playbook\Tests\Playbooks;

use Scaling\Playbook\Playbook;
use Scaling\Playbook\Tests\Utils\Models\User;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserPlaybook extends Playbook
{
    public function run(InputInterface $input, OutputInterface $output): void
    {
        factory(User::class, 3)->create();
    }
}
