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
            'hours' => DateService::getHours(),
            'minutes' => DateService::getMinutes(),
        );
        return View::make('congregations.create', $data);
    }

    public function processCreateCongregation()
    {
        $congregation = new Congregation;
        $congregation->name = Input::get('name');
        $congregation->address = Input::get('address');
        $congregation->pm_day_of_week = Input::get('pm_day_of_week');
        $congregation->pm_datetime = Input::get('pm_datetime_hours') . ':' . Input::get('pm_datetime_minutes') . ':00';

        try
        {
            CongregationService::createCongregation($congregation);

            $this->success(trans('messages.congregationCreated'));

            return Redirect::route('congregations.list');
        }
        catch (ValidationException $e)
        {
            return Redirect::route('congregations.create')
                ->withInput(Input::all())
                ->withErrors($e->getValidator());
        }
        catch (ServiceException $e)
        {
            Log::info($e->getMessage());
        }
        catch (Exception $e)
        {
            Log::error($e->getMessage());
        }

        $this->error(trans('messages.unexpectedError'));

        return Redirect::route('congregations.create')
            ->withInput(Input::all());

    }

}
