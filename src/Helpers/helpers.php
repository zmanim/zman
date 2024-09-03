<?php

use Zman\Zman;
use Zman\Helpers\Hebcal;
use Zman\Exceptions\InvalidDateException;

require_once 'holidays.php';
require_once 'parshios.php';

if (!function_exists('toSecular')) {
    /**
     * Convert a Jewish date to a secular date.
     *
     * @param  string|int $month
     * @param  string|int $day
     * @param  string|int $year
     * @return \Zman\Zman
     */
    function toSecular($month, $day, $year)
    {
        if ($month === 6 && !isJewishLeapYear($year)) {
            throw new InvalidDateException("{$year} is not a leap year.");
        }

        return Zman::createFromFormat('m/d/Y', jdtogregorian(jewishtojd($month, $day, $year)))->startOfDay();
    }
}

if (!function_exists('toJewish')) {
    /**
     * Convert a secular date to a Jewish date.
     *
     * @param  string|int $month
     * @param  string|int $day
     * @param  string|int $year
     * @return array
     */
    function toJewish($month, $day, $year)
    {
        return jdtojewish(gregoriantojd($month, $day, $year));
    }
}

if (!function_exists('isJewishLeapYear')) {
    /**
     * Checks if a Jewish year is meubar.
     *
     * @param  string|int $year
     * @return bool
     */
    function isJewishLeapYear($year)
    {
        return (1 + ($year * 7)) % 19 < 7 ? true : false;
    }
}

if (!function_exists('toHebrewNumber')) {
    /**
     * Convert a number to Hebrew.
     *
     * @param  string|int $number
     * @return string
     */
    function toHebrewNumber($number)
    {
        return Hebcal::numberToHebrew($number);
    }
}
