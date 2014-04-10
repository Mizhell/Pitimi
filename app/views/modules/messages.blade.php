<?php

    $messages = Session::get('messages');

?>



@if ($messages instanceof Illuminate\Support\MessageBag)

    @foreach($messages->getMessages() as $type => $contents)

        <ul>

        @foreach($contents as $content)
            <li><strong>{{{ print_r($type, true) }}}</strong> {{{ print_r($content, true) }}}</li>
        @endforeach

        </ul>

    @endforeach

@endif
