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

    public function createCongregation()
    {
        $data = array(
            'weekdays' => DateService::getWeekdays(),
        );
        return View::make('congregations.create', $data);
    }

}
