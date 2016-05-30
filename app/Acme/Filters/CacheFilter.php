<?php namespace Acme\Filters;
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 5/27/2016
 * Time: 9:56 PM
 *
 * Added based on laracast here (for caching outline page): https://laracasts.com/lessons/caching-essentials
 */

use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Str;
use Cache;

class CacheFilter{

//    Added while trying this (but didn't get it to work, so commenting out): https://laracasts.com/lessons/caching-essentials
//    public function fetch(Route $route, Request $request)
//    {
//        $key = $this->makeCacheKey($request->url());
//
//        if (Cache::has($key)) return Cache::get($key);
//    }
//
//
//    public function put(Route $route, Request $request, Response $response)
//    {
//        $key = $this->makeCacheKey($request->url());
//
//        if ( ! Cache::has($key)) Cache::put($key, $response->getContent(), 60);
//    }
//
//
//    protected function makeCacheKey($url)
//    {
//        return 'route_' . Str::slug($url);
//    }
}