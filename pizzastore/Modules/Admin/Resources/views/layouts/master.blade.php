<!DOCTYPE html>
<html>
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" sizes="16x16" href="{{ asset('images/favicon.ico') }}" />
        <!-- Styles -->

        <link href="{{ asset('css/ui.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/jquery.min.js') }}"></script>

        @yield('head')

        @yield('css')
    </head>

    <body>
        <div id="app">
            @include ('admin::layouts.nav-top')
            @include ('admin::layouts.nav-left')
            <div class="content-container">
                @yield('content-wrapper')
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $(".dropdown-toggle").click(function(){
                    $('.dropdown-list').toggle();
                });

                $(document).click((function(t){
                    var e=t.target;
                    if(!$(e).parents(".dropdown-open").length)
                        $(".dropdown-list").hide();
                }));
            });
        </script>
    </body>
</html>