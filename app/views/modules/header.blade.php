<header class="container">
    <h1>{{{ Config::get('app.name') }}}</h1>
    <span class="greetings">{{{ Lang::get('messages.loggedAs') }}} {{{ Auth::user()->username }}} | <a href="{{ route('logout') }}">Logout</a></span>
    @include('modules.nav')
</header>
