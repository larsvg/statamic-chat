<?php

namespace Larsvg\StatamicChat;

use Carbon\Carbon;

class StatamicChat
{
    public static function officeHours(): bool
    {
        if (Carbon::now()->isWeekend()) {
            return false;
        }
        if (Carbon::now()->isBefore(Carbon::createFromTime(8, 30))) {
            return false;
        }
        if (Carbon::now()->isAfter(Carbon::createFromTime(17, 30))) {
            return false;
        }
        return true;
    }

}
