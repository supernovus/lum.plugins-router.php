<?php

namespace Lum\Plugins;

use Lum\Router as LR;

class Router extends LR\Router
{
  public $default_placeholder = LR\Vars::CLASSIC_PLACEHOLDER;

  public $route_methods = 
  [
    'GET','POST','PUT','DELETE','HEAD','PATCH','OPTIONS',
    'POKE','CLEAN','UNDELETE',
  ];

  public function __construct($opts=[])
  {
    parent::__construct($opts);

    if (isset($opts['extend']) && $opts['extend'])
    { // Register some helpers into the Lum object.
      $core = \Lum\Core::getInstance();
      $core->addMethod('dispatch',     [$this, 'route']);
      $core->addMethod('addRoute',     [$this, 'add']);
      $core->addMethod('addRedirect',  [$this, 'redirect']);
      $core->addMethod('addPage',      [$this, 'display']);
      $core->addMethod('setDefault',   [$this, 'setDefault']);
      $core->addMethod('loadRoutes',   [$this, 'load']);
    }
  }
}
