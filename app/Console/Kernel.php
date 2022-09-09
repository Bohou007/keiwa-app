<?php

namespace App\Console;


use App\Console\Commands\PublishScheduledPostsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\SiteSearch\Commands\CrawlCommand;
use \Spatie\Health\Commands\ScheduleCheckHeartbeatCommand;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(RunHealthChecksCommand::class)->everyMinute();
        $schedule->command(ScheduleCheckHeartbeatCommand::class)->everyMinute();

        // $schedule->command('schedule-monitor:clean')->daily();
        $schedule->command('responsecache:clear')->daily();
        $schedule->command(CrawlCommand::class)->everyThreeHours();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}