<?php

class CongregationController extends BaseController {

    public function __construct()
    {
        $this->setMenu('congregations');
    }

    public function showCongregations()
    {
        try {
            $congregations = CongregationService::getCongregations();
            return View::make('congregations.list')->with('congregations', $congregations);
        } catch (Exception $e) {
            return $this->handleException($e);
        }

    }

    public function showCreateCongregation()
    {
        $data = array(
            'weekdays' => DateService::getWeekdays(),
        );
        return View::make('congregations.create', $data);
    }

    public function processCreateCongregation()
    {
        $congregation = new Congregation;
        $congregation->name = Input::get('name');
        $congregation->address = Input::get('address');
        $congregation->pm_day_of_week = Input::get('pm_day_of_week');
        $congregation->pm_datime = Input::get('pm_datime');

        $validator = $congregation->getValidator();
        if ($validator->fails())
        {
            return Redirect::route('congregations.create')
                ->withInput(Input::all())
                ->withErrors($validator);
        }

    }

}
