<?php

/**
 * The DateService class provides all date service operations.
 */
class DateService
{
    /**
     * Return all weekdays.
     *
     * @param $firstDayOfWeek string The first day of the week.
     *
     * @return array All weekdays.
     */
    public static function getWeekdays($firstDayOfWeek = 'Monday')
    {
        Log::info('Get all days of week.');

        $weekdays = array();

        for ($i = 0; $i < 7; $i++)
        {
            $weekdays[$i] = strftime('%A', strtotime('next ' . $firstDayOfWeek . ' +' . $i . ' days'));
        }

        return $weekdays;
    }

    public static function getHours()
    {
        $hours = array();
        for ($i = 0; $i < 24; $i++)
        {
            $hours[$i] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        return $hours;
    }

    public static function getMinutes()
    {
        $minutes = array();
        for ($i = 0; $i < 60; $i += 15)
        {
            $minutes[$i] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        return $minutes;
    }
}
