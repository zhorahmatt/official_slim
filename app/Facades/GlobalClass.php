<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class GlobalClass extends Facade{
    protected static function getFacadeAccessor() { return 'globalclass'; }
}