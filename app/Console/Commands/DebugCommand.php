<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

class DebugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:middleware';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug middleware registration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking middleware existence:');
        
        // Check admin middleware class existence
        $adminMiddlewareExists = class_exists(\App\Http\Middleware\AdminMiddleware::class);
        $this->info('AdminMiddleware exists: ' . ($adminMiddlewareExists ? 'Yes' : 'No'));
        
        $isAdminMiddlewareExists = class_exists(\App\Http\Middleware\IsAdmin::class);
        $this->info('IsAdmin middleware exists: ' . ($isAdminMiddlewareExists ? 'Yes' : 'No'));
        
        // Check middleware aliases
        $middlewareAliases = app()->make(\Illuminate\Contracts\Http\Kernel::class)->getMiddlewareAliases();
        $this->info('Middleware aliases:');
        foreach ($middlewareAliases as $alias => $class) {
            $this->line("$alias => $class" . (class_exists($class) ? ' (Class exists)' : ' (Class MISSING)'));
        }
        
        // Try to resolve admin middleware directly
        try {
            $instance = app()->make(\App\Http\Middleware\IsAdmin::class);
            $this->info('IsAdmin class resolved successfully');
        } catch (\Exception $e) {
            $this->error('Failed to resolve IsAdmin class: ' . $e->getMessage());
        }
        
        return 0;
    }
}
