<?php

namespace Stevebauman\WinSchedule;

use COM;
use VARIANT;

class Scheduler
{
    /**
     * The scheduled task name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The underlying schedule service COM object.
     *
     * @var VARIANT
     */
    protected $service;

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name = '')
    {
        $this->name = $name;

        $this->service = new COM('Schedule.Service');

        $this->service->connect();
    }

    /**
     * Creates a new scheduled task.
     *
     * @return Task
     */
    public function newTask()
    {
        return new Task($this->service->newTask(0));
    }

    /**
     * Saves the given task.
     *
     * The default flag is set for create
     *
     * @param int  $flags
     * @param Task $task
     */
    public function saveTask(Task $task, $flags = Scheduler::TASK_CREATE_OR_UPDATE)
    {
        $folder = $this->service->getFolder($task->getFolderPath());

        $folder->registerTaskDefinition($task->getName(), $task->getResource(), $flags, 'SYSTEM', null, Task::LOGON_PASSWORD);
    }
}
