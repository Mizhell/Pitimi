<?php

    $messages = Session::get('messages');

?>


<div class="messages">
    @if ($messages instanceof Illuminate\Support\MessageBag)

        @foreach($messages->getMessages() as $type => $contents)

            <ul class="{{{ $type }}}">

            @foreach($contents as $content)
                <li>{{{ $content }}}</li>
            @endforeach

            </ul>

        @endforeach

    @endif
</div>
