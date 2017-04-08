<ul class="menu">
    <li class="menu-item">
        <a href="{{ action('UserController@getSettings') }}" class="{{ Request::fullUrl() == action('UserController@getSettings') ? 'active' : '' }}">
            @lang('app.settings')
        </a>
    </li>
    <li class="menu-item">
        <a href="{{ action('UserController@getUpdateEmail') }}" class="{{ Request::fullUrl() == action('UserController@getUpdateEmail') ? 'active' : '' }}">
            @lang('app.update_email')
        </a>
    </li>                
    <li class="menu-item">
        <a href="{{ action('UserController@getUpdatePassword') }}" class="{{ Request::fullUrl() == action('UserController@getUpdatePassword') ? 'active' : '' }}">
            @lang('app.update_password')
        </a>
    </li>   
    <li class="menu-item">
        <a href="{{ action('LocationController@index') }}" class="{{ Request::fullUrl() == action('LocationController@index') ? 'active' : '' }}">
            @lang('app.my_addresses')
        </a>
    </li>                             
    <li class="menu-item">
        <a href="#menus">
            @lang('app.notifications')
        </a>
    </li>
</ul>  