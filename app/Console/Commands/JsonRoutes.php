<?php

namespace App\Console\Commands;

use File;
use Illuminate\Routing\Router;
use Illuminate\Console\Command;

class JsonRoutes extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'routes:json';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Generate routes as json file';

  /**
  * Create a new command instance.
  *
  * @return void
  */
  protected $router;
  public function __construct(Router $router)
  {
    parent::__construct();
    $this->router = $router;
  }

  /**
  * Execute the console command.
  *
  * @return mixed
  */
  public function handle()
  {
    $routes = [];
    foreach ($this->router->getRoutes() as $route) {
      $routes[$route->getName()] = $route->uri();
    }
    File::put('resources/js/routes.json', json_encode($routes, JSON_PRETTY_PRINT));
  }
}
