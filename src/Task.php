<?php

namespace Stevebauman\WinSchedule;

use Stevebauman\WinSchedule\Triggers\Factory as TriggerFactory;

class Task
{
    const LOGON_NONE = 0;
    const LOGON_PASSWORD = 1;
    const LOGON_S4U = 2;
    const LOGON_INTERACTIVE_TOKEN = 3;
    const LOGON_GROUP = 4;
    const LOGON_SERVICE_ACCOUNT = 5;
    const LOGON_INTERACTIVE_TOKEN_OR_PASSWORD = 6;

    const FLAG_VALIDATE_ONLY = 1;
    const FLAG_CREATE = 2;
    const FLAG_UPDATE = 4;
    const FLAG_CREATE_OR_UPDATE = 6;
    const FLAG_DISABLE = 8;
    const FLAG_DONT_ADD_PRINCIPAL_ACE = 10;
    const FLAG_IGNORE_REGISTRATION_TRIGGERS = 20;

    /**
     * The task name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The underlying task COM object.
     *
     * @var \Variant
     */
    protected $resource;

    /**
     * The task settings instance.
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
     * The task creation flags.
     *
     * @var int
     */
    protected $flags = Task::FLAG_CREATE_OR_UPDATE;

    /**
     * Constructor.
     *
     * @param \Variant $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;

        $this->settings = new Settings($resource->Settings);

        $this->setDefaults();
    }

    /**
     * Sets the resource variant object.
     *
     * @param \VARIANT $resource
     *
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Returns the underlying VARIANT resource object.
     *
     * @return \Variant
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Sets the task creation flags.
     *
     * @param int $flags
     *
     * @return $this
     */
    public function setCreationFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * Returns the task creation flags.
     *
     * @return int
     */
    public function getCreationFlags()
    {
        return $this->flags;
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
     * Sets the name of the task.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the name of the task.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
        $this->resource->principal->logonType = $type;

        return $this;
    }

    /**
     * Returns the tasks logon type.
     *
     * @return integer
     */
    public function getLogonType()
    {
        return $this->resource->principal->logonType;
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
    public function setFolderPath($folder = '\\')
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
        return $this->setFolderPath('\\');
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
        return $this->resource->RegistrationInfo->{$key};
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
        $this->resource->RegistrationInfo->{$key} = $value;

        return $this;
    }
}
