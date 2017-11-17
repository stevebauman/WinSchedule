<?php

namespace Stevebauman\Schedule;

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
     * @var \Variant
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
    public function task()
    {
        return new Task($this->service->newTask(0));
    }

    /**
     * Saves the given task.
     *
     * @param Task $task
     */
    public function saveTask(Task $task)
    {
        $folder = $this->service->getFolder($task->getFolderPath());

        $folder->registerTaskDefinition($this->name, $task, TASK_CREATE_OR_UPDATE, 'SYSTEM', null, TASK_LOGON_PASSWORD);
    }
}
