<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title', '..:: Codivex ::..')</title>

    <meta name="description" content="Web based application">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Stylesheets --}}
    {{ HTML::style('assets/css/vendor/bootstrap.min.css') }}
    {{ HTML::style('assets/css/main.css') }}
    @yield('styles')
</head>
<body>

    <header class="navbar navbar-codivex navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-content">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(!Auth::check())
                    <a class="navbar-brand" href="{{ action('HomeController@index') }}">
                @else
                    <a class="navbar-brand" href="{{ action('DashboardController@index') }}">
                @endif
                    {{ HTML::image('assets/img/codivex.jpg', 'Codivex') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="nav navbar-nav" role="navigation">
                    <li class="active">
                        @if(!Auth::check())
                            {{ link_to_action('HomeController@index', 'Login') }}
                        @else
                            {{ link_to_action('DashboardController@index', 'Dashboard') }}
                        @endif
                    </li>
                </ul>

                {{-- Dynamic View --}}
                @include('layouts._nav')
            </div>
        </div>
    </header>

    <div class="jumbotron">
        <div class="container">
            <h2>Dashboard</h2>
        </div>
    </div>

    <div id="content">
        <div class="container">
            @include('layouts._helpmsg')

            @yield('content')
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <address>
                        <strong>Codivex bvba</strong><br>
                        Vlimmersebaan 136 Unit 2<br>
                        2275 Wechelderzande<br/>
                        België<br/>
                        <abbr title="Phone">P:</abbr> +32(0)3/298.31.16 <br/>
                        <abbr title="Fax">F:</abbr> +32(0)3/298.31.17
                    </address>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <hr/>
        <section id="copyright" class="text-center">
            <small>&copy; Codivex</small>
        </section>
    </footer>

    {{-- Javascript --}}
    {{ HTML::script('assets/js/vendor/jquery-1.11.0.min.js') }}
    {{ HTML::script('assets/js/vendor/bootstrap.min.js') }}
    {{ HTML::script('assets/js/main.js') }}
    @yield('scripts')
</body>
</html>