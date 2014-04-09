@if (Config::get('app.assets_debug'))
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/bower_components/requirejs/require.js" data-main="/assets/js/main"></script>
    <script src="//localhost:8009/livereload.js"></script>
@else
    <link rel="stylesheet" href="/assets/dist/main.css">
    <script src="/assets/dist/main.js"></script>
@endif