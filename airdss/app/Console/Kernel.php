<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $middleware = [
        'authMiddleware' => \App\Http\Middleware\AuthMiddleware::class,
        'adminMiddleware' => \App\Http\Middleware\AdminMiddleware::class
    ];

    protected $RouteMiddleware = [
        'authMiddleware' => \App\Http\Middleware\AuthMiddleware::class,
        'adminMiddleware' => \App\Http\Middleware\AdminMiddleware::class
    ];

    protected $middlewareGroups = [
        'web' => [],

        'api' => [],
        'authMiddleware' => [\App\Http\Middleware\AuthMiddleware::class],
        'adminMiddleware' => [\App\Http\Middleware\AdminMiddleware::class]
    ];
    
    protected $commands = [

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
