<?php

class Congregation extends Eloquent
{
    protected $table = 'congregations';

    public function getValidator()
    {
        $data = array(
            'name' => $this->name,
            'address' => $this->address,
            'pm_day_of_week' => $this->pm_day_of_week,
            'pm_datetime' => $this->pm_datetime,
        );

        $rules = array(
            'name' => ['required'],
            'address' => ['required'],
            'pm_day_of_week' => ['required', 'integer', 'between:0,6'],
            'pm_datetime' => ['required', 'regex:([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]'],
        );

        return Validator::make($data, $rules);
    }
}
