<?php

namespace Stevebauman\WinSchedule\Triggers;

class Logon extends Trigger
{
    /**
     * Sets the logon user of the trigger.
     *
     * If null is given, the task is started when any user logs into the computer.
     *
     * @param string|null $username
     *
     * @return $this
     */
    public function setUser($username = null)
    {
        $this->object->UserId = $username;

        return $this;
    }

    /**
     * Retrieves the logon user of the trigger.
     *
     * @return string|null
     */
    public function getUser()
    {
        return $this->object->UserId;
    }

    /**
     * {@inheritdoc}
     */
    public function type()
    {
        return 9;
    }
}
