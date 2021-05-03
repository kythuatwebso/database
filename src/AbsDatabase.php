<?php

namespace Webso;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model as Eloquent;

class AbsDatabase extends Eloquent
{
    protected $container;

    public function __construct()
    {
        $this->container = Container::getInstance();

        $this->container->singleton(Manager::class, function () {
            $manager = new Manager;

            $manager->addConnection([
                'driver'    => 'mysql',
                'host'      => LOCALHOST,
                'database'  => DBNAME,
                'username'  => USERNAME,
                'password'  => PASSWORD,
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);

            $manager->setAsGlobal();
            $manager->bootEloquent();

            return $manager;
        });

        $this->container->alias(Manager::class, 'laravel.db');
        $this->container->make('laravel.db');
    }
}
