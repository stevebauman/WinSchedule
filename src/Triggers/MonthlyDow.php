<?php

namespace Stevebauman\WinSchedule\Triggers;

class MonthlyDow extends Trigger
{
    /**
     * {@inheritdoc}
     */
    public function type()
    {
        return 5;
    }
}
