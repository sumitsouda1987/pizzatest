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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--script src="{{ asset('js/jquery.min.js') }}"></script-->

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