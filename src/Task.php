<?php

namespace Stevebauman\Schedule;

class Task
{
    const LOGON_NONE = 0;
    const LOGON_PASSWORD = 1;
    const LOGON_S4U = 2;
    const LOGON_INTERACTIVE_TOKEN = 3;
    const LOGON_GROUP = 4;
    const LOGON_SERVICE_ACCOUNT = 5;
    const LOGON_INTERACTIVE_TOKEN_OR_PASSWORD = 6;

    /**
     * The underlying task COM object.
     *
     * @var \Variant
     */
    protected $object;

    /**
     * The task settings.
     *
     * @var Settings
     */
    protected $settings;

    /**
     * The folder location to store the task in.
     *
     * @var string
     */
    protected $folder = '//';

    /**
     * Constructor.
     *
     * @param \Variant $task
     */
    public function __construct($task)
    {
        $this->object = $task;

        $this->settings = new Settings($this->object->TaskSettings);

        $this->setDefaults();
    }

    /**
     * Returns the settings instance.
     *
     * @return Settings
     */
    public function settings()
    {
        return $this->settings;
    }

    /**
     * Sets the description of the task.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description = '')
    {
        return $this->setInfo('Description', $description);
    }

    /**
     * Retrieves the description from the task.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->getInfo('Description');
    }

    /**
     * Sets the author of the task.
     *
     * @param string $author
     *
     * @return Task
     */
    public function setAuthor($author = '')
    {
        return $this->setInfo('Author', $author);
    }

    /**
     * Retrieves the author of the task.
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->getInfo('Author');
    }

    /**
     * Sets the version of the task.
     *
     * @param string $version
     *
     * @return Task
     */
    public function setVersion($version = '')
    {
        return $this->setInfo('Version', $version);
    }

    /**
     * Retrieves the version of the task.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->getInfo('Version');
    }

    /**
     * Sets the logon type for the current task.
     *
     * @param int $type
     *
     * @return Task
     */
    public function setLogonType($type)
    {
        $this->object->principal->logonType = $type;

        return $this;
    }

    /**
     * Returns the task folder.
     *
     * @return string
     */
    public function getFolderPath()
    {
        return $this->folder;
    }

    /**
     * Sets the folder location to store the task under.
     *
     * @param string $folder
     *
     * @return Task
     */
    public function setFolderPath($folder = '//')
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * Sets the default task settings.
     *
     * @return Task
     */
    public function setDefaults()
    {
        return $this->setFolderPath('//');
    }

    /**
     * Retrieves registration info by the given key.
     *
     * @param string $key
     *
     * @return mixed
     */
    protected function getInfo($key)
    {
        return $this->object->RegistrationInfo->{$key};
    }

    /**
     * Sets registration info values on the given key.
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    protected function setInfo($key, $value)
    {
        $this->object->RegistrationInfo->{$key} = $value;

        return $this;
    }
}
