<?php

namespace Webso;

use Webso\AbsDatabase;

class BootDB extends AbsDatabase
{
    public static function boot()
    {
        new static;
    }
}
