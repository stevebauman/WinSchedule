<?php

namespace Stevebauman\WinSchedule;

class Settings
{
    /**
     * The underlying settings COM object.
     *
     * @var \VARIANT
     */
    protected $object;

    /**
     * Settings constructor.
     *
     * @param \Variant $object
     */
    public function __construct($object)
    {
        $this->object = $object;

        $this->setDefaults();
    }

    /**
     * Enables the task.
     *
     * @return Settings
     */
    public function enabled()
    {
        return $this->setEnabled(true);
    }

    /**
     * Disables the task.
     *
     * @return Settings
     */
    public function disabled()
    {
        return $this->setEnabled(false);
    }

    /**
     * Sets the task to be visible.
     *
     * @return Settings
     */
    public function visible()
    {
        return $this->setHidden(false);
    }

    /**
     * Sets the task to be hidden.
     *
     * @return Settings
     */
    public function hidden()
    {
        return $this->setHidden(true);
    }

    /**
     * Indicates that the Task Scheduler can start the task at
     * any time after its scheduled time has passed.
     *
     * @return Settings
     */
    public function startWhenAvailable()
    {
        return $this->setStartWhenAvailable(true);
    }

    /**
     * Sets the enabled setting.
     *
     * @param bool $enabled
     *
     * @return Settings
     */
    public function setEnabled($enabled = true)
    {
        $this->object->enabled = $enabled;

        return $this;
    }

    /**
     * Sets the hidden setting.
     *
     * @param bool $hidden
     *
     * @return Settings
     */
    public function setHidden($hidden = false)
    {
        $this->object->hidden = $hidden;

        return $this;
    }

    /**
     * Sets the startWhenAvailable setting.
     *
     * @param bool $enabled
     *
     * @return Settings
     */
    public function setStartWhenAvailable($enabled = true)
    {
        $this->object->startWhenAvailable = $enabled;

        return $this;
    }

    /**
     * Sets the default settings.
     *
     * @return Settings
     */
    public function setDefaults()
    {
        return $this->enabled()->visible()->startWhenAvailable();
    }
}
