<?php

use Illuminate\Support\Facades\Route;

function isRouteActive($route){  
    return Route::currentRouteName() == $route ? "active" : "";
}

function routeActive($route, $content) {
    return '<li class="nav-item">
    <a class="nav-link ' . isRouteActive($route) .'" href="'. route($route). '">'. $content .'</a>
</li>';
}