<?php

namespace Stevebauman\Schedule\Triggers;

class Time extends Trigger
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 1;
    }
}
