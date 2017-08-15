<?php

use App\Services\Hook;
use Illuminate\Http\Request;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events, Request $request) {

    if (!empty(option('index_style_type'))) {
        $style = option('index_style_type');
        switch ($style) {
            case 'fixed':
                View::alias('GPlane\MultiIndexStyle::index.index-fixed', 'index');
                break;
            case 'old':
                View::alias('GPlane\MultiIndexStyle::index.index-old', 'index');
                break;
            case 'default':
                View::alias('GPlane\MultiIndexStyle::index.index-default', 'index');
                break;
            default:
                break;
        }
    }

    if ($request->is('/')) {
        Hook::addScriptFileToPage(plugin_assets('multi-index-style', 'assets/js/dist.js'));
    }

    Hook::addRoute(function ($routers) {
        $routers->group([
            'middleware' => 'web',
            'namespace'  => 'GPlane\MultiIndexStyle\Controllers',
            'prefix'     => 'index-style'
            ],
            function ($router) {
                $router->any('/', 'StyleController@info');
                $router->any('example', 'StyleController@exampleShow');
            });
    });
};
