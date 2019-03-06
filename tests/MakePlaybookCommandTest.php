<?php

namespace Scaling\Playbook\Tests;

use Illuminate\Filesystem\Filesystem;

class MakePlaybookCommandTest extends TestCase
{
    /*** @var \Illuminate\Filesystem\Filesystem */
    private $fileSystem;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fileSystem = app(Filesystem::class);
    }

    /** @test */
    public function it_can_successfully_create_a_new_playbook()
    {
        $this->artisan('playbook:make Foo')
            ->expectsOutput('Playbook created successfully.')
            ->assertExitCode(0);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->fileSystem->delete(__DIR__.DIRECTORY_SEPARATOR. 'Playbooks/FooPlaybook.php');
    }
}
