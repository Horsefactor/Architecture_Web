<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.n.YaE25' shared service.

return $this->privates['.service_locator.n.YaE25'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'manager' => ['privates', '.errored..service_locator.n.YaE25.Doctrine\\Common\\Persistence\\ObjectManager', NULL, 'Cannot autowire service ".service_locator.n.YaE25": it references interface "Doctrine\\Common\\Persistence\\ObjectManager" but no such service exists. Did you create a class that implements this interface?'],
    'security' => ['privates', 'security.helper', 'getSecurity_HelperService.php', true],
], [
    'manager' => 'Doctrine\\Common\\Persistence\\ObjectManager',
    'security' => '?',
]);
