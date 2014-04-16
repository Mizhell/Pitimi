<?php

class CongregationService
{
    public static function getCongregations()
    {
        Log::info('Get congregations.');
        return Congregation::paginate(10);
    }

    public static function createCongregation(Congregation $congregation)
    {
        $validator = $congregation->getValidator();

        if ($validator->fails())
        {
            throw new ValidationException($validator);
        }

        $congregation->created_by = Auth::user()->id;
        $congregation->updated_by = Auth::user()->id;

        $congregation->save();
    }
}
