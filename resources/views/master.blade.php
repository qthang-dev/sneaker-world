<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" value="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}?v={{ time() }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <the-app></the-app>
        </div>

        <script src="{{ mix('js/app.js') }}?v={{ time() }}"></script>
    </body>
</html>