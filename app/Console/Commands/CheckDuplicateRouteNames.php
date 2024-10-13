<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class CheckDuplicateRouteNames extends Command
{
    protected $signature = 'routes:check-duplicates';

    protected $description = 'Check for duplicate route names';

    public function handle()
    {
        $routes = Route::getRoutes();
        $routeNames = [];

        foreach ($routes as $route) {
            if ($name = $route->getName()) {
                // If a route name already exists, it's a duplicate
                if (isset($routeNames[$name])) {
                    $this->error("Duplicate route name found: '{$name}' for URI '{$route->uri}'");
                } else {
                    $routeNames[$name] = $route->uri;
                }
            }
        }

        $this->info('Duplicate route name check complete.');
    }
}
