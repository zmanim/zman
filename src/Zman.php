<?php

namespace Zman;

use Carbon\Carbon;
use Zman\Moadim\Moadim;
use Zman\Formats\Formats;
use Zman\Getters\Getters;
use Zman\Setters\Setters;
use Zman\Tefilos\Tefilos;
use Zman\Helpers\LeapYears;
use Zman\Helpers\DaysOfTheWeek;

class Zman extends Carbon
{
    use Moadim;
    use Formats;
    use Getters;
    use Setters;
    use Tefilos;
    use LeapYears;
    use DaysOfTheWeek;

    protected $jdate;
    protected $galus = true;

    /**
     * Zman inherits from Carbon which in turn
     * inherits from \DateTime. This allows
     * us access to tons of nifty stuff.
     *
     * @param string $time
     * @param string $tz
     */
    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);

        $carbon = Carbon::parse($time);
        list($this->jdate['month'], $this->jdate['day'], $this->jdate['year'])
            = explode('/', toJewish($carbon->month, $carbon->day, $carbon->year));
    }

    /**
     * Create a new instance from a Jewish date.
     *
     * @param  string|int $year
     * @param  string|int $month
     * @param  string|int $day
     * @return Zman\Zman
     */
    public static function createFromJewishDate($year, $month, $day)
    {
        return toSecular($month, $day, $year);
    }
}
