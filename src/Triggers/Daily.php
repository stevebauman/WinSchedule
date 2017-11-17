<?php

namespace Stevebauman\WinSchedule\Triggers;

class Daily extends Trigger
{
    /**
     * {@inheritdoc}
     */
    public function type()
    {
        return 2;
    }
}
