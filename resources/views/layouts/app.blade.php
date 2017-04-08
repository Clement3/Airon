<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <header class="section-header">
            <section class="container grid-960">
                <nav class="navbar">
                    <section class="navbar-primary">
                        <a href="{{ url('/') }}" class="navbar-brand mr-10">{{ config('app.name', 'Laravel') }}</a>
                    </section>
                    <section class="navbar-section">
                        <a href="{{ url('/') }}" class="btn btn-link">@lang('app.home')</a>
                    </section>
                    <section class="navbar-section">
                        @if (Auth::guest())
                        <a href="{{ route('login') }}" class="btn btn-link">@lang('app.login')</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">@lang('app.register')</a>
                        @else
                        <div class="dropdown dropdown-right">
                            <a href="#" class="avatar-dropdown dropdown-toggle" tabindex="0">
                                <figure class="avatar" data-initial="{{ Auth::user()->nameForAvatar() }}" style="background-color: #5764c6;"></figure> <i class="icon icon-caret"></i>
                            </a>           
                            <ul class="menu">  
                                <li class="menu-item">
                                    <a href="{{ route('profile', ['user' => Auth::user()->name]) }}">@lang('app.profile')</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ action('UserController@getSettings') }}">@lang('app.settings')</a>
                                </li>                                 
                                <li class="menu-item">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('app.logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>                                     
                                </li>                                                                    
                            </ul>       
                        </div>                                          
                        @endif
                    </section>
                </nav>
            </section>
        </header>

        @if (Auth::check())
            @if (!Auth::user()->confirmed)
                <section class="not-confirm text-center">
                    @lang('app.not-confirm') <a href=""><i class="icon icon-link"></i>@lang('app.not-confirm-link')</a>
                </section>
            @endif
        @endif

        <div class="margin-header"></div>

        @yield('content')

        <footer>
            <a href="" id="back-to-top">
                <div class="back-to-top">
                    <p>Retour en haut</p>
                </div>
            </a>
            <section class="links">
                <div class="container grid-960">
                    <div class="columns">
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">Mentions légales</li>
                                <li><a href="">Règles de confidentialité</a></li>
                                <li><a href="">Conditions d’utilisation</a></li>
                                <li><a href="">Mentions légales</a></li>
                            </ul>
                         </div>
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">Besoin d'aide ?</li>
                                <li><a href="">Centre d'aide</a></li>
                                <li><a href="">Support</a></li>
                                <li><a href="">Nous contacter</a></li>
                            </ul>
                         </div>
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">Besoin d'aide ?</li>
                                <li><a href="">Centre d'aide</a></li>
                                <li><a href="">Support</a></li>
                                <li><a href="">Nous contacter</a></li>
                            </ul>
                         </div>
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">Mentions légales</li>
                                <li><a href="">Règles de confidentialité</a></li>
                                <li><a href="">Conditions d’utilisation</a></li>
                                <li><a href="">Mentions légales</a></li>
                            </ul>
                         </div>                                                                         
                    </div>
                </div>
            </section>
            <section class="copyright">
                <div class="container grid-960">
                    <p>© 2017 Monsterdeals, Tout droit réservés.</p>
                </div>
            </section>           
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
