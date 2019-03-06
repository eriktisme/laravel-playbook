<?php

namespace Scaling\Playbook;

class PlaybookDefenition
{
    /**
     * The playbook identification.
     *
     * @var string
     */
    public $id;

    /**
     * The instance of the playbook.
     *
     * @var \Scaling\Playbook\Playbook
     */
    public $playbook;

    /**
     * Times the playbook needs to run.
     *
     * @var int
     */
    public $times = 1;

    /**
     * Playbook only has to run once.
     *
     * @var bool
     */
    public $once = false;

    /**
     * Create a new playbook instance.
     *
     * @param string $className
     * @return void
     */
    public function __construct(string $className)
    {
        $this->playbook = app($className);
        $this->id = get_class($this->playbook);
    }

    /**
     * Create a new playbook instance which has to run more than one time.
     *
     * @param string $className
     * @param int $times
     * @return \Scaling\Playbook\PlaybookDefenition
     */
    public static function times(string $className, int $times): self
    {
        $defenition = new self($className);
        $defenition->times = $times;

        return $defenition;
    }

    /**
     * Create a new playbook instance which only has to run once.
     *
     * @param string $className
     * @return \Scaling\Playbook\PlaybookDefenition
     */
    public static function once(string $className): self
    {
        $defenition = new self($className);
        $defenition->once = true;

        return $defenition;
    }
}
