<header class="container">
    <h1>{{{ Config::get('app.name') }}}</h1>
    <span class="greetings">{{{ Lang::get('messages.loggedAs') }}} {{{ Auth::user()->username }}}</span>
    <?php
        $menu = Session::get('menu') ?: '';
    ?>
    <nav>
        <ul>
            <li><a {{ $menu == 'home' ? 'class="selected"' : '' }} href="#">{{{ Lang::get('messages.home') }}}</a></li>
            <li><a {{ $menu == 'speakers' ? 'class="selected"' : '' }} href="#">{{{ Lang::get('messages.speakers') }}}</a></li>
            <li><a {{ $menu == 'congregations' ? 'class="selected"' : '' }} href="#">{{{ Lang::get('messages.congregations') }}}</a></li>
            <li><a {{ $menu == 'talks' ? 'class="selected"' : '' }} href="#">{{{ Lang::get('messages.talks') }}}</a></li>
        </ul>
    </nav>
</header>
