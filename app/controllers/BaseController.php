<?php

use Illuminate\Support\MessageBag as MessageBag;

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function success($message)
    {
        $this->messages('success', $message);
    }

    protected function warning($message)
    {
        $this->messages('warning', $message);
    }

    protected function error($message)
    {
        $this->messages('error', $message);
    }

    protected function setMenu($menu) {
        Session::flash('menu', $menu);
    }

    private function messages($key, $message)
    {
        $messages = Session::get('messages');
        if ( ! ($messages instanceof MessageBag))
        {
            $messages = new MessageBag;
        }
        $messages->add($key, $message);
        Session::flash('messages', $messages);
    }

}
