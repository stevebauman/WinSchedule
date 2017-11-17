<?php

namespace Stevebauman\WinSchedule\Triggers;

class Factory
{
    /**
     * The underlying task object.
     *
     * @var \VARIANT
     */
    protected $object;

    /**
     * Constructor.
     *
     * @param \VARIANT $task
     */
    public function __construct($task)
    {
        $this->object = $task;
    }

    /**
     * Returns a new event trigger.
     *
     * @return Event
     */
    public function event()
    {
        return new Event(
            $this->newTrigger(Trigger::TYPE_EVENT)
        );
    }

    /**
     * Returns a new time trigger.
     *
     * @return Time
     */
    public function time()
    {
        return new Time(
            $this->newTrigger(Trigger::TYPE_TIME)
        );
    }

    /**
     * Returns a new daily trigger.
     *
     * @return Daily
     */
    public function daily()
    {
        return new Daily(
            $this->newTrigger(Trigger::TYPE_DAILY)
        );
    }

    /**
     * Returns a new weekly trigger.
     *
     * @return Weekly
     */
    public function weekly()
    {
        return new Weekly(
            $this->newTrigger(Trigger::TYPE_WEEKLY)
        );
    }

    /**
     * Returns a new monthly trigger.
     *
     * @return Monthly
     */
    public function monthly()
    {
        return new Monthly(
            $this->newTrigger(Trigger::TYPE_MONTHLY)
        );
    }

    /**
     * Returns a new monthly (day of the week) trigger.
     *
     * @return MonthlyDow
     */
    public function monthlyDayOfWeek()
    {
        return new MonthlyDow(
            $this->newTrigger(Trigger::TYPE_MONTHLY_DOW)
        );
    }

    /**
     * Returns a new idle trigger.
     *
     * @return Idle
     */
    public function idle()
    {
        return new Idle(
            $this->newTrigger(Trigger::TYPE_IDLE)
        );
    }

    /**
     * Returns a new registration trigger.
     *
     * @return Registration
     */
    public function registration()
    {
        return new Registration(
            $this->newTrigger(Trigger::TYPE_REGISTRATION)
        );
    }

    /**
     * Returns a new boot trigger.
     *
     * @return Boot
     */
    public function boot()
    {
        return new Boot(
            $this->newTrigger(Trigger::TYPE_BOOT)
        );
    }

    /**
     * Returns a new logon trigger.
     *
     * @return Logon
     */
    public function logon()
    {
        return new Logon(
            $this->newTrigger(Trigger::TYPE_LOGON)
        );
    }

    /**
     * Returns a new Session State Change trigger.
     *
     * @return SessionStateChange
     */
    public function sessionStateChange()
    {
        return new SessionStateChange(
            $this->newTrigger(Trigger::TYPE_SESSION_STATE_CHANGE)
        );
    }

    /**
     * Creates a new trigger on the task by the given type.
     *
     * @param int $type
     *
     * @return \VARIANT
     */
    protected function newTrigger($type)
    {
        return $this->object->Triggers->Create($type);
    }
}
