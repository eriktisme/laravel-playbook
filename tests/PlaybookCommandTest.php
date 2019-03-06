<?php

namespace Scaling\Playbook\Tests;

use Scaling\Playbook\Tests\Utils\Models\User;

class PlaybookCommandTest extends TestCase
{
    /** @test */
    public function when_no_playbook_name_is_given_ask_developer_for_a_playbook()
    {
        $this->artisan('playbook:run')
            ->expectsQuestion('Please choose a playbook', 'DefaultPlaybook')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\DefaultPlaybook` (#1)')
            ->assertExitCode(0);
    }

    /** @test */
    public function when_a_playbook_name_is_provided_it_should_run()
    {
        $this->artisan('playbook:run DefaultPlaybook')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\DefaultPlaybook` (#1)')
            ->assertExitCode(0);
    }

    /** @test */
    public function when_a_playbook_has_a_before_playbook_make_sure_it_has_ran()
    {
        $this->artisan('playbook:run PlaybookWithBefore')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\UserPlaybook` (#1)')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\UserPlaybook` (#2)')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\PlaybookWithBefore` (#1)')
            ->assertExitCode(0);

        $this->assertEquals(6, User::count());
    }

    /** @test */
    public function when_a_playbook_has_a_after_playbook_make_sure_it_runs()
    {
        $this->artisan('playbook:run PlaybookWithAfter')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\PlaybookWithAfter` (#1)')
            ->expectsOutput('Running playbook `Scaling\Playbook\Tests\Playbooks\UserPlaybook` (#1)')
            ->assertExitCode(0);

        $this->assertEquals(3, User::count());
    }
}
