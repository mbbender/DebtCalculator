<?php

namespace Mbender;

use Carbon\Carbon;

class HumanTimeFormatter {


    public static function humanTimeFromMonths($months)
    {
        if($months == 0) return 'never';

        $now = new Carbon();
        $futureTime = (new Carbon())->addMonths($months);

        return $futureTime->diff($now)->format('%y years %m months');

    }
}