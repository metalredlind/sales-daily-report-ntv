<?php

use Illuminate\Support\Facades\Session;

function setActive(array $route)
{
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}
