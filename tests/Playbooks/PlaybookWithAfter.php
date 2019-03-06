<?php

namespace Scaling\Playbook\Tests\Playbooks;

use Scaling\Playbook\Playbook;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlaybookWithAfter extends Playbook
{
    public function run(InputInterface $input, OutputInterface $output): void
    {
        //
    }

    public function after(): array
    {
        return [
            UserPlaybook::once(),
        ];
    }
}
