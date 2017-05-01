@extends('layouts.app')

@section('title', Lang::get('app.home'))

@section('content')

<div class="home">
    <div class="container grid-960">
        <div class="columns">
            <div class="column col-12 text-center">
                <h1>{{ config('app.name', 'Laravel') }}</h1>
                <p>@lang('home.slogan', ['site' => config('app.name', 'Laravel')])</p>
                <a href="" class="btn btn-lg mt-20">@lang('home.browse_all_ads')</a>              
            </div>
            <div class="column col-6">
            </div>            
        </div>
        <div class="home-arrow-down">
            <a href="" class="no-focus"><i class="icon icon-arrow-down"></i></a>
        </div>
    </div>
</div>

<div class="home-search">
    <div class="container grid-960">
        <div class="columns">
            <div class="column col-12">
                <form>
                    <div class="columns">
                        <div class="column col-5 col-sm-12">
                            <input class="form-input input-lg" type="text" placeholder="Name">
                        </div>  
                        <div class="column col-3 col-sm-12">
                            <select class="form-select select-lg width-100">
                                <option>Choose an option</option>
                                <option>Slack</option>
                                <option>Skype</option>
                                <option>Hipchat</option>
                            </select>
                        </div>
                        <div class="column col-3 col-sm-12">
                            <input class="form-input input-lg" type="text" placeholder="Name">
                        </div> 
                        <div class="column col-1 col-sm-12">
                            <button class="btn btn-primary btn-action btn-lg hide-sm">
                                <i class="icon icon-search"></i>
                            </button>                       
                            <button class="btn btn-primary btn-lg show-sm btn-block">
                                Rechercher
                            </button>                                                    
                        </div>                         
                    </div>              
                </form>
            </div>
        </div>
    </div>
</div>

<div class="home-categories">
    <div class="container grid-960">
        <div class="columns">
            @foreach ($categories as $category)
            <div class="column col-4 col-sm-6 col-xs-12">
                <ul class="home-categories-list">
                    <li><a href="" class="home-categories-title text-bold">{{ $category->name }}</a></li>
                    @foreach ($category->childCategories() as $child_category)
                    <li><a href="">{{ $child_category->name }}<span class="float-right"><i class="icon icon-arrow-right"></i></span></a></li>
                    @endforeach
                </ul>         
            </div>
            @endforeach                      
        </div>
    </div>
</div>
@endsection
