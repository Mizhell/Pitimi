<?php

class DateService
{
    /**
     * Return all weekdays.
     *
     * @return array All weekdays.
     */
    public static function getWeekdays()
    {
        Log::info('Get all days of week.');

        $weekdays = array();

        for ($i = 0; $i < 7; $i++)
        {
            $weekdays[$i] = strftime( '%A', strtotime( 'next Sunday +' . $i . ' days' ) );
        }

        return $weekdays;
    }
}
