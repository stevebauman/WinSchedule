<?php

namespace Stevebauman\WinSchedule\Triggers;

use Carbon\Carbon;

abstract class Trigger
{
    const TYPE_EVENT = 0;
    const TYPE_TIME = 1;
    const TYPE_DAILY = 2;
    const TYPE_WEEKLY = 3;
    const TYPE_MONTHLY = 4;
    const TYPE_MONTHLY_DOW = 5;
    const TYPE_IDLE = 6;
    const TYPE_REGISTRATION = 7;
    const TYPE_BOOT = 8;
    const TYPE_LOGON = 9;
    const TYPE_SESSION_STATE_CHANGE = 11;

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
     * Sets the identifier of the trigger.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->object->Id = $id;

        return $this;
    }

    /**
     * Retrieves the identifier of the trigger.
     *
     * @return string
     */
    public function getId()
    {
        return $this->object->Id;
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
}
