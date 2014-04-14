<?php

Form::macro('error', function($name)
{
    $errors = Session::get('errors');
    if ($errors)
    {
        return '<span class="error">'.$errors->first($name).'</span>';
    }
});

Form::macro('errors', function($message = null)
{
    $errors = Session::get('errors');
    if ($errors)
    {
        $data = array(
            'type' => 'warning',
            'content' => $message ?: trans('messages.formErrors'),
        );
        return View::make('modules/message')->with($data);
    }
});
