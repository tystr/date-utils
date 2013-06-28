<?php

namespace Tystr\Util;

/**
 * Mangles dates to set the correct timezones and hours
 *
 * @author Tyler Stroud <tyler@tylerstroud.com>
 */
class DateUtils
{
    /**
     * @param string|null $from     A valid datetime string or null, defaults to 'yesterday' 
     * @param string|null $timezone A valid timezone string
     *
     * @return \DateTime
     */
    public static function createFromDate($from = 'yesterday', $timezone = null)
    {
        $from = static::getDateTime($from, $timezone);
        $from->setTime(00, 00, 00);

        return $from;
    }

    /**
     * @param string|null $to       A valid datetime string or null, defaults to 'today'
     * @param string|null $timezone A valid timezone string
     *
     * @return \DateTime
     */
    public static function createToDate($to = 'today', $timezone = null)
    {
        $to = static::getDateTime($to, $timezone);
        $to->setTime(23, 59, 59);

        return $to;
    }

    /**
     * @param null|string $dateString Either null or a valid datetime string
     * @param string      $timezone   A valid timezone string
     *
     * @return \DateTime
     */
    protected static function createDateTime($dateString, $timezone)
    {
        if (null === $dateString) {
            $date = new \DateTime('now', new \DateTimeZone($timezone));
        } else {
            $date = new \DateTime($dateString, new \DateTimeZone($timezone));
        }

        return $date;
    }
}

