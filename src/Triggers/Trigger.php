<?php

namespace Stevebauman\Schedule\Triggers;

use Carbon\Carbon;

abstract class Trigger
{
    /**
     * The underlying trigger object.
     *
     * @var \VARIANT
     */
    protected $object;

    /**
     * Trigger constructor.
     *
     * @param \VARIANT $trigger
     */
    public function __construct($trigger)
    {
        $this->object = $trigger;
    }

    /**
     * Enable the trigger.
     *
     * @return Trigger
     */
    public function enabled()
    {
        return $this->setEnabled(true);
    }

    /**
     * Disable the trigger.
     *
     * @return Trigger
     */
    public function disabled()
    {
        return $this->setEnabled(false);
    }

    public function startAt()
    {
        //
    }

    public function endAt()
    {
        //
    }

    /**
     * Sets the boolean value that indicates whether the trigger is enabled.
     *
     * @param bool $bool
     *
     * @return Trigger
     */
    public function setEnabled($bool)
    {
        $this->object->Enabled = $bool;

        return $this;
    }

    abstract public function getType();
}
