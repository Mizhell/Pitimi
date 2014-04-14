<?php

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
            $weekdays[$i] = strftime( '%A', strtotime( 'next ' . $firstDayOfWeek . ' +' . $i . ' days' ) );
        }

        return $weekdays;
    }
}
