<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

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
        <header class="section-header" id="top">
            <section class="container grid-960">
                <nav class="navbar">

                    <section class="navbar-primary">
                        <a href="{{ url('/') }}" class="navbar-brand mr-10">{{ config('app.name', 'Laravel') }}</a>
                    </section>

                    <section class="navbar-section show-sm">
                        <a href="" class="btn btn-primary"><i class="icon icon-menu"></i></a>
                    </section>

                    <section class="navbar-section hide-sm">
					 	<a href="" class="btn">All Ads</a>
                        <a href="{{ action('ItemController@create') }}" class="btn btn-link">@lang('app.place_an_ad')</a>
                        <div class="dropdown">
                            <a href="#" class="btn btn-link dropdown-toggle" tabindex="0" data-turbolinks="false">
                                @lang('pages.getting_started') <i class="icon icon-caret"></i>
                            </a>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="{{ action('PageController@show', ['slug' => 'how-to-sell']) }}">@lang('pages.how_to_sell')</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ action('PageController@show', ['slug' => 'how-to-buy']) }}">@lang('pages.how_to_buy')</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ action('PageController@show', ['slug' => 'ratings']) }}">@lang('pages.ratings')</a>
                                </li>                                                      
                            </ul>
                        </div>
                    </section>

                    <section class="navbar-section">
                        @if (Auth::guest())
                        <a href="{{ route('login') }}" class="btn btn-link no-focus">@lang('app.login')</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">@lang('app.register')</a>
                        @else
                        <div class="dropdown dropdown-right">
                            <a href="#" class="avatar-dropdown dropdown-toggle" tabindex="0" data-turbolinks="false">
                                <figure class="avatar" data-initial="{{ Auth::user()->nameForAvatar() }}" style="background-color: #5764c6;">
                                @if (!empty(Auth::user()->profile->avatar))
                                <img src="{{ Storage::url(Auth::user()->profile->avatar) }}" alt="Avatar">
                                @endif
                                </figure> <i class="icon icon-caret"></i>
                            </a>           
                            <ul class="menu">  
                                <li class="menu-item">
                                    <a href="{{ route('profile', ['user' => Auth::user()->name]) }}">@lang('app.profile')</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ action('UserController@getSettings') }}">@lang('app.settings')</a>
                                </li>
                                @if (Auth::user()->admin)
                                <li class="menu-item">
                                    <a href="{{ action('UserController@getSettings') }}">Administration</a>
                                </li>
                                @endif                                                                     
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
        
        <div class="sub-header">
            <div class="container grid-960">
                <div class="columns">
                    <div class="column col-8 col-sm-10">
						<a href="" class="btn btn-primary">Catégories <i class="icon icon-caret"></i></a>                  
                    </div>
                    <div class="column col-4 col-sm-2 text-right">
                        <a href="" class="btn btn-primary btn-action"><i class="icon icon-search"></i></a>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::check())
            @if (!Auth::user()->confirmed)
                <section class="not-confirm text-center">
                    @lang('app.not-confirm') <a href="{{ action('ConfirmationController@create') }}"><i class="icon icon-link"></i>@lang('app.not-confirm-link')</a>
                </section>
            @endif
        @endif

        @if (!Request::is('/'))
        <div class="margin-header"></div>
        @endif

        @yield('content')

        @if (!Request::is('/'))
        <div class="footer-margin"></div>
        @endif

        <footer>
            <a href="#top" id="back-to-top" data-turbolinks="false">
                <div class="back-to-top">
                    <p>@lang('app.back_to_top')</p>
                </div>
            </a>
            <section class="links">
                <div class="container grid-960">
                    <div class="columns">
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">@lang('pages.about')</li>
                                <li><a href="{{ action('PageController@show', ['slug' => 'privacy']) }}">@lang('pages.privacy')</a></li>
                                <li><a href="{{ action('PageController@show', ['slug' => 'terms']) }}">@lang('pages.terms_of_use')</a></li>
                                <li><a href="{{ action('PageController@show', ['slug' => 'legal']) }}">@lang('pages.legal_notice')</a></li>
                            </ul>
                         </div>
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">@lang('pages.help')</li>
                                <li><a href="">@lang('pages.help_center')</a></li>
                                <li><a href="">@lang('pages.support')</a></li>
                                <li><a href="{{ action('PageController@getContact') }}">@lang('pages.contact_us')</a></li>
                            </ul>
                         </div>
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">@lang('pages.getting_started')</li>
                                <li><a href="{{ action('PageController@show', ['slug' => 'how-to-sell']) }}">@lang('pages.how_to_sell')</a></li>
                                <li><a href="{{ action('PageController@show', ['slug' => 'how-to-buy']) }}">@lang('pages.how_to_buy')</a></li>
                                <li><a href="{{ action('PageController@show', ['slug' => 'ratings']) }}">@lang('pages.ratings')</a></li>
                            </ul>
                         </div>
                        <div class="column col-3 col-sm-12">
                            <ul>
                                <li class="links-title">@lang('pages.social')</li>
                                <li><a href="">Facebook</a></li>
                                <li><a href="">Twitter</a></li>
                                <li><a href="">Android, iOS</a></li>
                            </ul>
                         </div>                                                                         
                    </div>
                </div>
            </section>
            <section class="copyright">
                <div class="container grid-960">
                    <p class="text-center">@lang('app.copyright', ['site' => config('app.name', 'Laravel')])</p>
                </div>
            </section>           
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
