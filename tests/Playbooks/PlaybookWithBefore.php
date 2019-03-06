<?php

namespace Scaling\Playbook\Tests\Playbooks;

use Scaling\Playbook\Playbook;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlaybookWithBefore extends Playbook
{
    public function run(InputInterface $input, OutputInterface $output): void
    {
        //
    }

    public function before(): array
    {
        return [
            UserPlaybook::times(2),
        ];
    }
}
