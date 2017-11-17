<?php

namespace Stevebauman\WinSchedule\Triggers;

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
     * @return $this
     */
    public function enabled()
    {
        return $this->setEnabled(true);
    }

    /**
     * Disable the trigger.
     *
     * @return $this
     */
    public function disabled()
    {
        return $this->setEnabled(false);
    }

    /**
     * Sets the start boundary date / time.
     *
     * @param string $date
     *
     * @return $this
     */
    public function startAt($date)
    {
        $this->object->StartBoundary = (new Carbon($date))->toAtomString();

        return $this;
    }

    /**
     * Sets the end boundary date / time.
     *
     * @param string $date
     *
     * @return $this
     */
    public function endAt($date)
    {
        $this->object->EndBoundary = (new Carbon($date))->toAtomString();

        return $this;
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

    abstract public function type();
}
