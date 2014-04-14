<?php

Form::macro('error', function($name)
{
    $errors = Session::get('errors');
    if ($errors)
    {
        $data = array(
            'errors' => $errors,
            'name' => $name,
        );
        return View::make('modules.field-error')->with($data);
    }
});

Form::macro('errors', function($message = null)
{
    $errors = Session::get('errors');
    if ($errors)
    {
        return HTML::warning($message ?: trans('messages.formErrors'));
    }
});

HTML::macro('success', function($content)
{
    return HTML::message('success', $content);
});

HTML::macro('warning', function($content)
{
    return HTML::message('warning', $content);
});

HTML::macro('error', function($content)
{
    return HTML::message('error', $content);
});

HTML::macro('message', function($type, $content)
{
    $data = array(
        'type' => $type,
        'content' => $content,
    );
    return View::make('modules/message')->with($data);
});
