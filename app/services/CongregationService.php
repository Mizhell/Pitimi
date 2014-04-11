<?php

class CongregationService
{
    public static function getCongregations()
    {
        Log::info('Get congregations.');
        return Congregation::paginate(10);
    }
}
